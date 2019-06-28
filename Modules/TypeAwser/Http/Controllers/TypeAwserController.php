<?php

namespace Modules\TypeAwser\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\NewGameShow\Entities\TypeAwser;
use Modules\TypeQuestion\Http\Requests\TypeRequest;

class TypeAwserController extends Controller
{
    public function store(TypeRequest $request)
    {
        $dataInput =TypeAwser::create($request->only('name','code'));
        return response()->json([
            'status' => 200,
            'data' => $dataInput,
            'message' => 'them thanh cong'
        ]);
    }

    public function show($type_awsers_id)
    {
        $showid =TypeAwser::find($type_awsers_id);
        if(!$showid){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        return response()->json([
            'status' => 200,
            'data' => $showid,
            'message' => 'SUCCESS'
        ]);

    }
    public function showAll()
    {
        $showAll=TypeAwser::all();
        return response()->json(['status'=>200,'data'=>$showAll,'message'=>'Success']);
    }

    public function update(TypeRequest $request, $type_awsers_id)
    {
        $dataInput=TypeAwser::find($type_awsers_id);
        if(!$dataInput){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        $dataInput->update($request->all());
        return response()->json(['status'=>200,'data'=>$dataInput,'message'=>'Update Success']);
    }

    public function destroy($type_awsers_id)
    {
        $dataInput=TypeAwser::find($type_awsers_id);
        if(!$dataInput){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        $dataInput->delete();
        return response()->json(['status'=>200,'data'=>$dataInput,'message'=>'Delete Success']);
    }
}
