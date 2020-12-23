<?php

namespace App\Http\Controllers\Api;

use App\Hoge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    public function store(Request $request)
    {
        $bucketList = new BucketList;
        $bucketList->image = $request->image;

        $bucketList->save();
    }

}
