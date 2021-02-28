<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'voters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','voter_id','mobile','address','city','postcode'];
}
