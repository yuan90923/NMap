<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'zip',
        'city',
        'area',
        'road',
        'lane',
        'alley',
        'no',
        'floor',
        'address',
        'filename',
        'latitude',
        'lontitue',
        'full_address'
    ];
}
