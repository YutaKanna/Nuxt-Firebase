<?php

namespace App\Http\Controllers;

use \app\BucketList;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BucketListController extends Controller
{
    public function index()
    {
        return [
            $bucketLists = BucketList::all()
        ];
    }
}
