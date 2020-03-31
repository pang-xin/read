<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $primaryKey='admin_id';
    protected $guarded = [];
    protected $table = 'admin';
    public $timestamps = false;
}
