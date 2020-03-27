<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    public $primaryKey='month_id';
    protected $guarded = [];
    protected $table = 'month';
    public $timestamps = false;
}
