<?php

namespace App\Http\Controllers\Api;

use App\BucketList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BucketListController extends Controller
{
    public function index()
    {
        return response()->json(['data' => [
            'bucketLists' => BucketList::all()
        ]]);
    }

    public function show($id)
    {
        $bucketList = BucketList::find($id);

        // return response()->json([
        //     'title' => $bucketList->title,
        //     'description' => $bucketList->description,
        // ]);

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
    }

    public function update(Request $request, $id)
    {
        $bucketList = BucketList::find($id);
        $bucketList->title = $request->title;
        $bucketList->description = $request->description;
        $bucketList->save();
    }

    public function destroy($id)
    {
        $bucketList = BucketList::find($id);
        $bucketList->delete();
    }


}
