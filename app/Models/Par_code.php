<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Par_code extends Model
{
    use HasFactory;
     private$filable=[
        'company_name' ,
         'reqistration_id',
        'tax_id' ,
         'print_time',
        'tot_vat' ,
         'vat' ,
         'printed_time' ,
     ];
}
