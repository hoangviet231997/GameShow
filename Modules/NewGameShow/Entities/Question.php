<?php

namespace Modules\NewGameShow\Entities;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table= 'questions' ;
    protected $fillable = ['content','path','type_question','type_awser','group_questions_id'];
}

