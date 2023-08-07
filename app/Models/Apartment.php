<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'number',
        'image',
        'rooms',
        'floor',
        'square',
        'block',
        'price',
        'total',
        'currency',
        'status',
        'client_id'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
