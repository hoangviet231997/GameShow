<?php

namespace Modules\NewGameShow\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupQuestion extends Model
{
    protected $fillable = ['name','description','show_id'];
}
