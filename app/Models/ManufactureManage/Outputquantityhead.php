<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputquantityhead extends Model
{
    //
    protected $fillable = [
        'outputdate',
        'checkno',
        'note',
        'manufactureshifts',
//        'machineno',
        'length',
        'totalpoints',
        'y100points',
        'grade',
        'processinfo_id',
        'checkshifts',
        'createname',
        'remark',
    ];

    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }

}
