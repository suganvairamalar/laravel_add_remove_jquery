<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dynamic_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name'];

   /* public function getFirstNameAttribute($first_name){
        return explode(',',$first_name);
    }

    public function getLastNameAttribute($last_name){
        return explode(',',$last_name);
    }


    public function setFirstNameAttribute($first_name){
        $this->attributes['first_name'] = implode(",", $first_name);
    }

    public function setLastNameAttribute($last_name){
        $this->attributes['last_name'] = implode(",", $last_name);
    }*/
}
