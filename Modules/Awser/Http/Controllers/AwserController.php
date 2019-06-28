<?php

namespace Modules\Awser\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Awser\Http\Requests\AwserRequest;
use Modules\NewGameShow\Entities\awser;
use Modules\NewGameShow\Entities\Question;

class AwserController extends BaseController
{
    public function store(AwserRequest $request)
    {
        $dataInput = $request->only('content','questions_id');
        $questionID = Question::where('id',$dataInput['questions_id'])->first();
        if(!$questionID){
            return 'id cua cau hoi k ton tai';
        }
        $store=awser::create($dataInput);
        return $this->responseSuccess($store,'Create Awser Success !');

    }

    public function show($id)
    {
        $showid=awser::find($id);
        if(!$showid)
        {
            return response()->json([
                'status_code' => 400,
                'data' => null,
                'message' => 'id khong ton tai'
                ],400);
        }
        return response()->json([
            'status_code' => 200,
            'data' => $showid,
            'message' => 'thanh cong'
        ]);
    }
    public function showAll()
    {
        $showall = awser::all();
        return response()->json([
            'status_code' => 200,
            'data' => $showall,
            'message' => 'thanh cong'
        ]);
    }

    public function update(Request $request, $id)
    {
        $update=awser::find($id);
        if(!$update)
        {
            return response()->json([
                'status_code' => 400,
                'data' => null,
                'message' => 'id khong ton tai'
            ],400);
        }
        $update->update($request->all());
        return response()->json([
            'status_code' => 200,
            'data' =>  $update,
            'message' => 'update success'
        ]);
    }

    public function destroy($id)
    {
        $destroy = awser::find($id);
        if(!$destroy)
        {
            return response()->json([
                'status_code' => 400,
                'data' =>  null,
                'message' => 'error'
            ],400);
        }
        $destroy->delete();
        return response()->json([
            'status_code' => 200,
            'data' =>  $destroy,
            'message' => 'delete success'
        ]);
    }
}
