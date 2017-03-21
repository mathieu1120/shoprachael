<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function create() {

        $items = Items::where('status', 1)
            ->orderBy('name', 'desc')
            ->get();

        return view('items', ['items' => $items]);
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

    public function search(Request $request) {
        return $this->create();
    }
}
