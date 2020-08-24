<?php

namespace App\Http\Controllers\Api;

use App\BucketList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    public function index()
    {
        $hoge = BucketList::all();
        return response()->json(['data' => [
            'bucketLists' => BucketList::all()
        ]]);
    }
}
