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

        })->orderBy('rent', $order)->paginate($top);

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
        $data = [
            'externalId' => $params['externalId'],
            'areaRaw' => $params['areaRaw'],
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
            'rentRaw' => $params['rentRaw'],
            'title' => $params['title'],
            'additionalCostsRaw' => $params['additionalCostsRaw'],
            'deposit' => $params['deposit'],
            'depositRaw' => $params['depositRaw'],
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
        $data = [
            'areaRaw' => $params['areaRaw'],
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
            'rentRaw' => $params['rentRaw'],
            'title' => $params['title'],
            'additionalCostsRaw' => $params['additionalCostsRaw'],
            'deposit' => $params['deposit'],
            'depositRaw' => $params['depositRaw'],
            'descriptionNonTranslated' => $params['descriptionNonTranslated'],
            'descriptionNonTranslatedRaw' => $params['descriptionNonTranslatedRaw'] ?? '',
            'descriptionTranslated' => $params['descriptionTranslated'],
            'descriptionTranslatedRaw' => $params['descriptionTranslatedRaw'] ?? '',
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
