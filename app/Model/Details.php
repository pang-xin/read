<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    public $primaryKey='details_id';
    protected $guarded = [];
    protected $table = 'details';
    public $timestamps = false;
}
