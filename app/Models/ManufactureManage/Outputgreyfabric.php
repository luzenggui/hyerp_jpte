<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputgreyfabric extends Model
{
    //
    protected $fillable = [
        'outputdate',
        'processinfo_id',
        'segmentqty',
        'qtyinspected',
        'ifcomplete',
        'createname',
        'note',
    ];

    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }
}
