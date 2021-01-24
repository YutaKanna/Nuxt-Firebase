<?php

namespace App\Http\Controllers\Api;

use App\Hoge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function index()
    {
        return response()->json(['data' => [
            'hoge' => Hoge::all()
        ]]);
    }

    public function store(Request $request)
    {
        \Log::debug($request);

        $hoge = new Hoge;
        $hoge->fill($request->all())->save();
    }

}
