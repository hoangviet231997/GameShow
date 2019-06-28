<?php

namespace Modules\NewGameShow\Entities;

use Illuminate\Database\Eloquent\Model;

class TypeQuestion extends Model
{
    protected $table = 'type_questions';
    protected $fillable = ['name', 'code'];
    protected $primaryKey = 'type_questions_id';
}
