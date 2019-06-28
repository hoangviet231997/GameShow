<?php

namespace Modules\Show\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\NewGameShow\Entities\Show;
use Modules\Show\Http\Requests\StoreRequest;
use Modules\Show\Http\Requests\UpdateRequest;

class ShowController extends Controller
{
    public function store(StoreRequest $request)
    {
        $dataInput = $request->only('name','description');
        $store = Show::create($dataInput);
        return response()->json([
            'status_code' => 200,
            'data' => $store,
            'message' => 'them thanh cong'
        ]);
    }

    public function show($id)
    {
        if(!$showid = Show::find($id))
            {  return response()->json([
                'status_code' => 400,
                'message' => 'id khong ton tai'
            ],400);
            }
        return response()->json([ 'status_code' => 200,
        'data' => $showid,
        'message' => 'success']);
    }

    public function showAll()
    {
        $showall = Show::all();
        return response()->json([
            'status_code' => 200,
            'data' => $showall,
            'message' => 'success'
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        if(!$update =Show::find($id)) {
            return response()->json([
                'status_code' => 400,
                'message' => 'id khong ton tai'],400);
        }
        $update->update($request->only('name','description'));
        return response()->json([
            'status_code' => 200,
            'data' => $update,
            'message' => 'update success' ]);
    }

    public function destroy($id)
    {
        if(!$destroy =Show::find($id)) {
            return response()->json([
                'status_code' => 400,
                'message' => 'id khong ton tai'],400);
        }
        $destroy->delete();
        return response()->json([
            'status_code' => 200,
            'data' => null,
            'message' => 'xoa success' ]);
    }
}
