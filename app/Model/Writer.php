<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    public $primaryKey='writer_id';
    protected $guarded = [];
    protected $table = 'writer';
    public $timestamps = false;
}
