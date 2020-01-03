<?php

namespace App\Models\Manufacturemanage;

use Illuminate\Database\Eloquent\Model;

class Processinfo extends Model
{
    //
    protected $fillable = [
        'insheetno',
        'pattern',
        'density',
        'width',
        'ffwidth',
        'unit',
        'syarntype',
        'contractno',
        'diliverydate',
        'orderquantity',
        'specification',
        'yarn100m',
    ];
}
