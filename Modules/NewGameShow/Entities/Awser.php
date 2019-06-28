<?php

namespace Modules\NewGameShow\Entities;

use Illuminate\Database\Eloquent\Model;

class awser extends Model
{
    protected $table= 'awsers';
    protected $fillable = ['content'];

    public function question()
    {
        return $this->belongsTo('Modules\NewGameShow\Entities\Question', 'questions_id');
    }
}
