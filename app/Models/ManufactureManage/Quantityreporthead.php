<?php

namespace App\Models\Manufacturemanage;

use Illuminate\Database\Eloquent\Model;

class Quantityreporthead extends Model
{
    //
    protected $fillable = [
        'djdate',
        'checkno',
        'note',
        'manufactureshifts',
        'machineno',
        'length',
        'totalpoints',
        'y100points',
        'grade',
        'processinfo_id',
        'checkshifts',
        'createname',
    ];

    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }

}
