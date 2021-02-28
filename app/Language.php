<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['person_name','languages_name'];

    public function getLanguagesNameAttribute($languages_name){
        return explode(',',$languages_name);
    }

    public function setLanguagesNameAttribute($languages_name){
        $this->attributes['languages_name'] = implode(",", $languages_name);
    }

}
