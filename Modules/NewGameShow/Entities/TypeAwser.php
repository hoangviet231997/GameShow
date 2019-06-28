<?php

namespace Modules\NewGameShow\Entities;

use Illuminate\Database\Eloquent\Model;

class TypeAwser  extends Model
{
    protected $table= 'type_awsers';
    protected $fillable = ['name','code'];
    protected $primaryKey='type_awsers_id';

}
