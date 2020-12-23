<?php

namespace App\Http\Controllers\Api;

use App\Hoge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function store(Request $request)
    {
        \Log::debug($request);
        $hoge = new Hoge;
        $hoge->name = $request->name;
        $hoge->image = $request->image;

        $hoge->save();
    }

}
