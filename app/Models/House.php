<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'properties';

    protected $guarded= [];
}
