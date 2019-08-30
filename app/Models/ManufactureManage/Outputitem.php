<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputitem extends Model
{
    //
    protected $fillable = [
        'outputhead_id',
        'fabricno',
        'machineno',
        'meter',
        'mass',
        'remark',
    ];
}
