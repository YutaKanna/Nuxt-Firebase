<?php

namespace App\Http\Controllers;

use App\BucketList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    public function index()
    {
        $hoge = BucketList::all();
        // dd($hoge);
        return response()->json(['data' => [
            'bucketLists' => BucketList::all()
        ]]);
    }
}
