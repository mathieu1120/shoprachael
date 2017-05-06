<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Items;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    public function edit(Request $request) {
        if (empty($request->itemId)) {
            return false;
        }
        $item = Items::find((int)$request->itemId);
        if (empty($item->id)) {
            return false;
        }
        return view('pages/editItem', ['item' => $item, 'request' => $request]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'cost' => 'required|numeric'
        ]);

        if (!empty($request->item_id)) {
            $item = Items::find($request->item_id);
        } else {
            $item = new Items();
        }

        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->price = $request->price;

        if ($request->sold) {
            $item->sold_price = $request->sold_price;
            $item->shipping_cost = $request->shipping_cost;
            $item->shipping_price = $request->shipping_price;
            $item->shipping_at = date('Y-m-d', strtotime($request->shipping_at));
            $item->sold_at = date('Y-m-d', strtotime($request->sold_at));
            $item->country_code = $request->country;
            $item->city = $request->city;
            $item->state = $request->state;
            $item->zipcode = $request->zipcode;
        } else {
            $item->sold_price = 0;
            $item->shipping_cost = 0;
            $item->shipping_price = 0;
            $item->shipping_at = "0000-00-00";
            $item->sold_at =  "0000-00-00";
            $item->country_code = '';
            $item->city = '';
            $item->state = '';
            $item->zipcode = '';
        }

        $item->save();
        return $this->search();
    }

    public function search(Request $request = null) {
        $param = [];
        $paramOr = [];
        $param[] = ['status', 1];
        if (!empty($request)) {
            if (!empty($request->has('name'))) {
                $param[] = ['name', $request->input('name')];
            }
            if (!empty($request->has('location'))) {
                $paramOr[] = ['state', $request->input('location')];
                $paramOr[] = ['country_code', $request->input('location')];
                $paramOr[] = ['city', $request->input('location')];
                $paramOr[] = ['zipcode', $request->input('location')];
            }
        } else {
            $request = new Request();
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
        $tableStats = $this->getTableStats($items);

        return view('items', ['items' => $items, 'tableStats' => $tableStats, 'request' => $request]);
    }

    private function getTableStats($items) {
        $tableStats = [
            'cost' => 0,
            'price' => 0,
            'shipping_cost' => 0,
            'shipping_price' => 0,
            'sold_price' => 0
        ];

        foreach ($items as $item) {
            $tableStats['cost'] += $item->cost ?: 0;
            $tableStats['price'] += $item->price ?: 0;
            $tableStats['shipping_cost'] += $item->shipping_cost ?: 0;
            $tableStats['shipping_price'] += $item->shipping_price ?: 0;
            $tableStats['sold_price'] += $item->sold_price ?: 0;
        }

        return $tableStats;
    }

    public function delete(Request $request) {
        if (empty($request->itemId)) {
            return false;
        }
        $item = Items::find((int)$request->itemId);
        if (empty($item->id)) {
            return false;
        }
        $item->status = 0;
        $item->save();
        return new JsonResponse(['itemId' => $item->id]);
    }
}
