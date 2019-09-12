<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputquantity extends Model
{
    //
    protected $fillable = [
        'outputdate',
        'number',
        'checkno',
        'manufactureshifts',
        'processinfo_id',
        'checkshifts',
        'createname',
        'remark',

        'fabricno',
        'machineno',
        'meter',
        'mass',

        'note',
        'length',
        'totalpoints',
        'y100points',
        'grade',
        'loosewarp',
        'wrongdraft',
        'dentmark',
        'warpstreak',
        'brokend_fillings',
        'hole',
        'wrongend_pick',
        'oiledend_pick',
        'shirikend_pick',
        'doublewarp_weft',
        'shw_selvedgemark',
        'colorstreaks',
        'weftbar',
        'beltweft',
        'foreignyarn',
        'knots',
        'neps',
        'tw',
        'fh',
        'cws',
        'th',
        'thn',
        'bsc',
        'jb',
    ];
    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }
}
