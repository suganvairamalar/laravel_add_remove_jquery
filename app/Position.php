<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['position_department_id','position_name'];
}
