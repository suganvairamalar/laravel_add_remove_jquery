<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taglist extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //use Sortable;

    protected $table = 'taglists';

    protected $fillable = ['name'];
}
