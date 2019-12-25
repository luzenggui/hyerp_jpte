<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Gradecffabric extends Model
{
    //
    protected $fillable = [
        'indate',
        'processinfo_id',
        'length',
        'remark1',
        'remark2',
        'createname',
    ];

    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }
}
