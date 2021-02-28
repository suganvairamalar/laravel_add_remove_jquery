<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBookDetail extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'author_book_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'book_name'];
}
