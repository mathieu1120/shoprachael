<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function create(Request $request) {

        return $this->search($request);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'cost' => 'required|numeric'
        ]);
        $item = new Items();
        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->price = $request->price;

        if ($request->sold) {
            $item->sold_price = $request->sold_price;
            $item->shipping_cost = $request->shipping_cost;
            $item->shipping_price = $request->shipping_price;
            $item->shipping_at = date('Y-m-d', strtotime($request->shipping_at));;
            $item->sold_at = date('Y-m-d', strtotime($request->sold_at));
            $item->country_code = $request->country;
            $item->city = $request->city;
            $item->state = $request->state;
            $item->zipcode = $request->zipcode;
        }

        $item->save();
        return $this->create();
    }

    public function search(Request $request = null) {
        $param = [];
        $paramOr = [];
        $param[] = ['status', 1];
        if (!empty($request->has('name'))) {
            $param[] = ['name', $request->input('name')];
        }
        if (!empty($request->has('location'))) {
            $paramOr[] = ['state', $request->input('location')];
            $paramOr[] = ['country_code', $request->input('location')];
            $paramOr[] = ['city', $request->input('location')];
            $paramOr[] = ['zipcode', $request->input('location')];
        }

        $sql = Items::where($param);
        if ($paramOr) {
            $sql->where(function($q) use ($paramOr) {
                foreach ($paramOr as $p) {
                    $q->orWhere([$p]);
                }
            });
        }

        $items = $sql->orderBy('created_at', 'desc')->get();
        return view('items', ['items' => $items, 'request' => $request]);
    }
}
