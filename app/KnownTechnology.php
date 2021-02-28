<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnownTechnology extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'known_technologies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['known_technology_name'];
}
