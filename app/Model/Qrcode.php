<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    public $primaryKey='qrcode_id';
    protected $guarded = [];
    protected $table = 'qrcode';
    public $timestamps = false;
}
