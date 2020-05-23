<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $stores = Store::all();
        return view('man/store', ['stores' => $stores]);
    }

    public function detail(Request $request) {
        $id = $request->id;
        $store = null;

        if (!is_null($id)) {
            $store = Store::find($id);
        }

        if ($request->isMethod('get')) {
            return view('man/store_detail', ['store' => $store]);
        }

        if ($request->isMethod('post')) {
            if (is_null($store)) {
                $store = new Store;
            }

            $image = null;
            if ($request->file('image')) {
                $image = $request->file('image')->store('stores', 'public');
            }
            if (!is_null($image)) {
                $store->image = $image;
            }

            $store->name = $request->name;
            $store->address = $request->address;
            $store->tel = $request->tel;
            $store->lat = $request->lat;
            $store->long = $request->long;
            $store->save();

            return redirect()->route('store');
        }
    }

    public function del(Request $request) {
        $id = $request->id;
        $store = Store::find($id);
        if (!is_null($store)) {
            $store->delete();
        }
        
        return redirect()->route('store');
    }

}
