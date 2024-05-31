<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'trade_name',
        'company_name',
        'document',
        'document_type',
        'email',
        'phone',
        'address_id',
    ];
}
