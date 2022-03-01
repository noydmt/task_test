<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index() {
        $shops_tokyo = Area::find(1)->shops;
        // dd($shops_tokyo);

        $area = Shop::find(3)->area;
        dd($area);
    }
}
