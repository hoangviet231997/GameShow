<?php
namespace Modules\Question\Http\Controllers;
use Illuminate\Session\Store;
use Modules\NewGameShow\Entities\GroupQuestion;
use Modules\NewGameShow\Entities\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\NewGameShow\Entities\TypeQuestion;
use Modules\Question\Http\Requests\TypeQuestionRequest;


class QuestionController extends Controller
{
    public function store(TypeQuestionRequest $request)
    {
        $dataInput = $request->only('content','path','type_question','type_awser','group_questions_id',"type_questions_id");
        $typeQ = TypeQuestion::find($dataInput["type_questions_id"]);
        $group_question =GroupQuestion::where('id',$dataInput['group_questions_id'])->first();
        if(!$group_question){
            return 'id cua group k ton tai';
        }
        if(is_null($typeQ)){
            return "id khong ton  tai";
        }
        if($typeQ->code == 'text'){
                unset($dataInput['path']);
        }
        else{
            $file_name=$dataInput['path']->getClientOriginalName();
            $dataInput['path']->move('storage/app/public/path',$file_name);
            $dataInput['path']=url('/').'/'.'storage/app/public/path'.$file_name;
        }
        $store =Question::create($dataInput);
        return response()->json([
            'status_code' => 200,
            'data' => $store,
            'message' => 'them thanh cong'
        ]);
    }


    public function show($id)
    {
        $show = Question::find($id);
        if (!$show) {
                return response()->json([
                    'status' => 400,
                    'data' => null,
                    'message' => 'error'
                ], 400);
        }
        return response()->json([
            'status' => 200,
            'data' => url('/').'.'.$show,
            'message' => 'success'
        ]);
    }
     public function showAll()
     {
//        $showall=Question::all();
         $showall = DB::select("CALL show_all_question()");
        return response()->json([
            'status_code' => 200,
            'data' =>  $showall,
            'message' => 'success'
        ]);
     }

     function update(Request $request, $id)
        {
            $update=Question::find($id);
            if(!$update)
            {
                return response()->json([
                    'status_code' => 400,
                    'data' =>  null,
                    'message' => 'error'
                ],400);
            }
            $update->update($request->all());
            return response()->json([
                'status_code' => 200,
                'data' =>  $update,
                'message' => 'update success'
                ]);
        }

        function destroy($id)
        {
            $destroy = Question::find($id);
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
