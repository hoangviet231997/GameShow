<?php

namespace Modules\TypeQuestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\NewGameShow\Entities\TypeQuestion;
use Modules\TypeQuestion\Http\Requests\TypeRequest;


class TypeQuestionController extends Controller
{
    public function store(TypeRequest $request)
    {
        $dataInput = TypeQuestion::create($request->only('name','code'));
        return response()->json([
            'status' => 200,
            'data' => $dataInput,
            'message' => 'them thanh cong'
        ]);
    }

    public function show($type_questions_id)
    {
       $showid =TypeQuestion::find($type_questions_id);
        if(!$showid){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        return response()->json([
            'status' => 200,
            'data' => $showid,
            'message' => 'SUCCESS'
        ]);

    }
    public function showAll()
    {
        $showAll=TypeQuestion::all();
        return response()->json(['status'=>200,'data'=>$showAll,'message'=>'Success']);
    }

    public function update(TypeRequest $request, $type_questions_id)
    {
        $dataInput=TypeQuestion::find($type_questions_id);
        if(!$dataInput){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        $dataInput->update($request->all());
        return response()->json(['status'=>200,'data'=>$dataInput,'message'=>'Update Success']);
    }

    public function destroy($type_questions_id)
    {
        $dataInput=TypeQuestion::find($type_questions_id);
        if(!$dataInput){return response()->json(['status' => 400,null,'message' => 'id khong ton tai'],400);}
        $dataInput->delete();
        return response()->json(['status'=>200,'data'=>$dataInput,'message'=>'Delete Success']);
    }
}
