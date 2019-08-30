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
        'syarntype',
        'contractno',
        'diliverydate',
        'orderquantity',
        'specification',
    ];
}
