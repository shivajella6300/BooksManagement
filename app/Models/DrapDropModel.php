<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrapDropModel extends Model
{
    use HasFactory;
    protected $table='drag_drop_table';
    protected $fillable = [
        'first_name','last_name'  
    ];

}
