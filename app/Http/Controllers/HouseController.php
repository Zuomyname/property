<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $top = $params['top'] ?? 10;
        $order = $params['order'] ?? 'desc';

        $lists = House::where(function ($query) use ($params) {
            if (isset($params['id'])) {
                $query->where('externalId', $params['id']);
            }
            if (isset($params['longitude'])) {
                $query->where('longitude', $params['longitude']);
            }
            if (isset($params['latitude'])) {
                $query->where('latitude', $params['latitude']);
            }
            if (isset($params['city'])) {
                $query->where('city', $params['city']);
            }
            if (isset($params['min'])) {
                $query->where('rent', ">=", intval($params['min']));
            }
            if (isset($params['max'])) {
                $query->where('rent', '<=', intval($params['max']));
            }
            if (isset($params['is_active']) && $params['is_active'] != 0) {
                $query->where('isRoomActive', $params['is_active']);
            }
        });

        if (isset($params['list_type']) && $params['list_type'] != 0) {
            switch ($params['list_type']) {
                case 1:
                    $lists->orderBy('rent', $order);
                    break;
                case 2:
                    $score = [];
                    $count = $lists->count();
                    for ($i = 0; $i < ceil($count / 100); $i++) {
                        $lists = House::where(function ($query) use ($params) {
                            if (isset($params['id'])) {
                                $query->where('externalId', $params['id']);
                            }
                            if (isset($params['longitude'])) {
                                $query->where('longitude', $params['longitude']);
                            }
                            if (isset($params['latitude'])) {
                                $query->where('latitude', $params['latitude']);
                            }
                            if (isset($params['city'])) {
                                $query->where('city', $params['city']);
                            }
                            if (isset($params['min'])) {
                                $query->where('rent', ">=", intval($params['min']));
                            }
                            if (isset($params['max'])) {
                                $query->where('rent', '<=', intval($params['max']));
                            }
                            if (isset($params['is_active']) && $params['is_active'] != 0) {
                                $query->where('isRoomActive', $params['is_active']);
                            }
                        })->skip(100 * $i)->take(100)->get();
                        foreach ($lists as $list) {
                            if (is_numeric($list->rent) && is_numeric($list->areaSqm) && $list->areaSqm != 0) {
                                $a = $list->rent / $list->areaSqm;
                                if ($order == 'desc') { // 最大 n 条
                                    if (!empty($score) && count($score) >= $top) {
                                        if ($a > min($score)) {
                                            $array_search = array_search(min($score), $score);
                                            unset($score[$array_search]);
                                            $score[$list->externalId] = $a;
                                        }
                                    } else {
                                        $score[$list->externalId] = $a;
                                    }
                                } else { // 最小n条
                                    if (!empty($score) && count($score) >= $top) {
                                        if ($a < max($score)) {
                                            $array_search = array_search(max($score), $score);
                                            unset($score[$array_search]);
                                            $score[$list->externalId] = $a;
                                        }
                                    } else {
                                        $score[$list->externalId] = $a;
                                    }
                                }
                            } else {
                                $list->aqm = 0;
                            }
                        }
                    }
                    if ($params['order'] == 'desc') {
                        arsort($score);
                    } else {
                        asort($score);
                    }

                    $keys = array_keys($score);

                    $end = [];
                    foreach ($keys as $key) {
                        $house = House::where('externalId', $key)->first();
                        $house->aqm = ($house->rent / $house->areaSqm);
                        $end[] = $house;
                    }
                    return view("index", [
                        'lists' => $end,
                        'params' => $params,
                        'by_square' => true
                    ]);
                    break;
                case 3:
                    // 计算平均值，中位数，标准差
                    if (isset($params['city'])) {
                        // 平均数
                        $rentTotal = 0;
                        $depositTotal = 0;
                        $data = [];
                        $deposit = [];
                        $count = $lists->count();
                        for ($i = 0; $i < ceil($count / 100); $i++) {
                            $houes = House::where(function ($query) use ($params) {
                                if (isset($params['id'])) {
                                    $query->where('externalId', $params['id']);
                                }
                                if (isset($params['longitude'])) {
                                    $query->where('longitude', $params['longitude']);
                                }
                                if (isset($params['latitude'])) {
                                    $query->where('latitude', $params['latitude']);
                                }
                                if (isset($params['city'])) {
                                    $query->where('city', $params['city']);
                                }
                                if (isset($params['min'])) {
                                    $query->where('rent', ">=", intval($params['min']));
                                }
                                if (isset($params['max'])) {
                                    $query->where('rent', '<=', intval($params['max']));
                                }
                                if (isset($params['is_active']) && $params['is_active'] != 0) {
                                    $query->where('isRoomActive', $params['is_active']);
                                }
                            })->skip(100 * $i)->take(100)->get();
                            foreach ($houes as $list) {
                               $rentTotal += $list->rent;
                               $depositTotal += $list->deposit;
                               $data[] = $list->rent;
                               $deposit[] = $list->deposit;
                            }
                        }
                        $rentAvg = $rentTotal/ $count;
                        $depositAvg = $depositTotal/ $count;
                        // 中位数
                        asort($data);
                        asort($deposit);
                        $data = array_values($data);
                        $deposit = array_values($deposit);
                        $zhCount = $count + 1;
                        if ($zhCount % 2 == 0) {
                            $middle = $zhCount /2;
                            $middleNum = $data[$middle];
                            $depositMiddleNum = $deposit[$middle];
                        }else {
                            $middle = ceil($zhCount / 2);
                            $middle2 = $middle-1;
                            $middleNum = ($data[$middle] + $data[$middle2]) /2;
                            $depositMiddleNum  = ($deposit[$middle] + $deposit[$middle2]) /2;
                        }
                        // 标准差
                        $biaozhunRe = [];
                        $depositBiaozhun = [];
                        foreach ($data as $datum) {
                            $biaozhunRe[] = pow($datum - $rentAvg, 2);
                        }
                        foreach ($deposit as $d) {
                            $depositBiaozhun[] = pow($d - $depositAvg, 2);
                        }
                        $biaozhunReAvg = sqrt(array_sum($biaozhunRe) / count($biaozhunRe));
                        $depositBiaozhunReAvg = sqrt(array_sum($depositBiaozhun) / count($depositBiaozhun));

                        $end = $lists->paginate(10);

                        $endData = [
                            'rentAvg' => $rentAvg,
                            'depositAvg' => $depositAvg,
                            'depositMiddleNum' => $depositMiddleNum,
                            'middleNum' => $middleNum,
                            'standard' => $biaozhunReAvg,
                            'depositBiaozhunReAvg' => $depositBiaozhunReAvg,
                            'lists' => $end,
                            'params' => $params
                        ];
                        return view('index', $endData);

                    }
                    break;

                default:
                    $lists->paginate($top);
            }
        }
        $lists = $lists->paginate($top);
        return view("index", compact('lists', 'params'));
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function add(Request $request)
    {
        $params = $request->all();
//        $findOne = House::where('externalId', $params['externalId'])->first();
//        if ($findOne) {
//            return response()->json([
//                'code' => 200,
//                'message' => 'id',
//                'data' => $params['id']
//            ]);
//        }
        $rentRaw = isset($params['rentDetail']) ? ', - ' . $params['rentDetail'] : '';
        $data = [
            'externalId' => $params['externalId'],
            'areaRaw' => $params['areaSqm'] . ' m2',
            'areaSqm' => $params['areaSqm'],
            'city' => $params['city'],
            'furnish' => $params['furnish'],
            'latitude' => $params['latitude'],
            'longitude' => $params['longitude'],
            'postalCode' => $params['postalCode'],
            'postedAgo' => $params['postedAgo'],
            'propertyType' => $params['propertyType'],
            'rawAvailability' => $params['rawAvailability'],
            'rent' => $params['rent'],
            'rentDetail' => $params['rentDetail'],
            'rentRaw' => '€ ' . $params['rent'] . $rentRaw,
            'title' => $params['title'],
            'additionalCostsRaw' => $params['additionalCostsRaw'],
            'deposit' => $params['deposit'],
            'depositRaw' => '€ ' . $params['deposit'],
            'descriptionNonTranslated' => $params['descriptionNonTranslated'],
            'descriptionNonTranslatedRaw' => $params['descriptionNonTranslatedRaw'] ?? "",
            'descriptionTranslated' => $params['descriptionTranslated'],
            'descriptionTranslatedRaw' => $params['descriptionTranslatedRaw'] ?? "",
            'energyLabel' => $params['energyLabel'],
            'gender' => $params['gender'],
            'internet' => $params['internet'],
            'isRoomActive' => $params['isRoomActive'],
            'kitchen' => $params['kitchen'],
            'living' => $params['living'],
            'matchAge' => $params['matchAge'],
            'matchCapacity' => $params['matchCapacity'],
            'matchGender' => $params['matchGender'],
            'matchLanguages' => $params['matchLanguages'],
            'matchStatus' => $params['matchStatus'],
            'pageDescription' => $params['pageDescription'],
            'pageTitle' => $params['pageTitle'],
            'pets' => $params['pets'],
            'registrationCostRaw' => $params['registrationCostRaw'],
            'roommates' => $params['roommates'],
            'shower' => $params['shower'],
            'smokingInside' => $params['smokingInside'],
            'toilet' => $params['toilet'],
        ];

        House::create($data);
        return redirect('/');
    }

    public function edit($id)
    {
        $list = House::where('externalId', $id)->first();
        return view('edit', compact('list'));
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $id = $params['externalId'];
        $rentRaw = isset($params['rentDetail']) ? ', - ' . $params['rentDetail'] : '';
        $data = [
            'areaRaw' => $params['areaSqm'] . ' m2',
            'areaSqm' => $params['areaSqm'],
            'city' => $params['city'],
            'furnish' => $params['furnish'],
            'latitude' => $params['latitude'],
            'longitude' => $params['longitude'],
            'postalCode' => $params['postalCode'],
            'postedAgo' => $params['postedAgo'],
            'propertyType' => $params['propertyType'],
            'rawAvailability' => $params['rawAvailability'],
            'rent' => $params['rent'],
            'rentDetail' => $params['rentDetail'],
            'rentRaw' => '€ ' . $params['rent'] . $rentRaw,
            'title' => $params['title'],
            'additionalCostsRaw' => $params['additionalCostsRaw'],
            'deposit' => $params['deposit'],
            'depositRaw' => '€ ' . $params['deposit'],
            'descriptionNonTranslated' => $params['descriptionNonTranslated'],
            'descriptionNonTranslatedRaw' => $params['descriptionNonTranslatedRaw'] ?? "",
            'descriptionTranslated' => $params['descriptionTranslated'],
            'descriptionTranslatedRaw' => $params['descriptionTranslatedRaw'] ?? "",
            'energyLabel' => $params['energyLabel'],
            'gender' => $params['gender'],
            'internet' => $params['internet'],
            'isRoomActive' => $params['isRoomActive'],
            'kitchen' => $params['kitchen'],
            'living' => $params['living'],
            'matchAge' => $params['matchAge'],
            'matchCapacity' => $params['matchCapacity'],
            'matchGender' => $params['matchGender'],
            'matchLanguages' => $params['matchLanguages'],
            'matchStatus' => $params['matchStatus'],
            'pageDescription' => $params['pageDescription'],
            'pageTitle' => $params['pageTitle'],
            'pets' => $params['pets'],
            'registrationCostRaw' => $params['registrationCostRaw'],
            'roommates' => $params['roommates'],
            'shower' => $params['shower'],
            'smokingInside' => $params['smokingInside'],
            'toilet' => $params['toilet'],
        ];
        House::where('externalId', $id)->update($data);

        return redirect('/');
    }

    public function delete($id)
    {
        House::where("externalId", $id)->delete();
        return redirect('/');
    }
}
