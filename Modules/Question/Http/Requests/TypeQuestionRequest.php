<?php

namespace Modules\Question\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'path'=> 'nullable',
            'type_question'=> 'required',
            'type_awser'=> 'required',
            'group_questions_id'=> 'required',
            'type_questions_id' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
