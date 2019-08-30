<?php

namespace App\Models\Manufacturemanage;

use Illuminate\Database\Eloquent\Model;

class Quantityreportitem extends Model
{
    //
    protected $fillable = [
        'quantityreporthead_id',
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
