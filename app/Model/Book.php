<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $primaryKey='book_id';
    protected $guarded = [];
    protected $table = 'book';
    public $timestamps = false;
}
