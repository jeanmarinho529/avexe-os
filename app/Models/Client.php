<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'address_id',
        'name',
        'document',
        'document_type',
        'birth_date',
        'email',
        'phone_one',
        'phone_two',
        'notes',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
