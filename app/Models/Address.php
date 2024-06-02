<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'complement',
        'landmark',
    ];
}
