<?php

namespace App\Http\Controllers;

use app\BucketList;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BucketListController extends Controller
{
    public function index()
    {
        $bucketLists = BucketList::all();

        return response()->json(['bucketLists' => $bucketLists]);
    }
}
