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
        $findOne = House::where('externalId', $params['id'])->first();
        $validate = $request->validate([]);
        if ($findOne) {
            return response()->json([
                'code' => 200,
                'message' => 'id',
                'data' => $params['id']
            ]);
        }
        $data = [
            'city' => '',
            'latitude' => '',
            'longitude' => '',
            'rent' => '',
            'externalId' => '',
            'coverImageUrl' => ''
        ];
//        dd($data);
//        return null;
    }

    public function edit($id)
    {
        $list = House::where('externalId', $id)->first();
        return view('edit', compact('list'));
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $id = $params['id'];
        $data = [
            'city' => 'test11'
        ];
        House::where('externalId', $id)->update($data);

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $del = DB::connection("mongodb")
            ->table("properties")
            ->where("externalId", $request->get("id"))
            ->destory();
        if ($del) {
            return response()->json([
                'code' => 200,
                'data' => [],
                'message' => 'delete success!'
            ]);
        }

        return redirect('index.index');
    }
}
