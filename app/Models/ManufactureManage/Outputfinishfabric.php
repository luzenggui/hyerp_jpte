<?php

namespace App\Models\ManufactureManage;

use Illuminate\Database\Eloquent\Model;

class Outputfinishfabric extends Model
{
    //
    protected $fillable = [
        'checkdate',
        'checkno',
        'processinfo_id',
        'qty',
        'checkshifts',
        'createname',
        'machineno',
        'fabricno',
        'weavingno',
        'greyfabricno',
        'mass',

        'vol_number',
        'length',
        'totalpoints',
        'y100points',
        'grade',

        'tearing',
        'skew_bow',
        'stains',
        'color_spot',
        'wrinkle_bar',
        'streakness',
        'narrow_width',
        'elastoprint',
        'colorstreaks',
        'weftbar',

        'loosewarp',
        'hole',
        'float',
        'brokenend_fillings',
        'shirikend_pick',
        'wrongend_pick',
        'wrong_draft',
        'mendingmark',
        'ribbon_yarn',
        'tw',
        'fh',
        'jb',
        'oiledend_pick',
        'neps',
        'knots',
        'tgby',
        'th',
        ];
    public function processinfo() {
        return $this->hasOne('App\Models\ManufactureManage\Processinfo', 'id', 'processinfo_id');
    }
}
