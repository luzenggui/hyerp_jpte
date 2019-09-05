<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputquantityitem extends Model
{
    //
    protected $fillable = [
        'outputquantityhead_id',

        'fabricno',
        'machineno',
        'meter',
        'mass',
        'remark',

        'note',
        'manufactureshifts',
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
}
