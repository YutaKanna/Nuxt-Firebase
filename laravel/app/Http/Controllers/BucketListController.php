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

    public function show($id)
    {
        $bucketList = BucketList::find($id);

        // return response()->json(
        // [
        //     'bucketList' => $bucketList
        // ]);

        return response()->json(['data' => [
            'bucketList' => $bucketList
        ]]);
    }

    public function store(Request $request)
    {
        $bucketList = new BucketList;
        $bucketList->title = $request->title;
        $bucketList->description = $request->description;

        $bucketList->save();

        return response()->json(['success'=>'Done!']);
    }
}
