<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputhead extends Model
{
    //
    protected $fillable = [
        'outputdate',
        'processinfo_id',
        'createname',
        'note',
    ];

    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }
}
