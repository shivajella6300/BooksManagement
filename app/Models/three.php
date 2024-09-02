<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class three extends Model
{
    use HasFactory;
    protected $table="hello";
    protected $primaryKey="hello_id";
}
