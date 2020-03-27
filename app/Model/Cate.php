<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $primaryKey='cate_id';
    protected $guarded = [];
    protected $table = 'cate';
    public $timestamps = false;
}
