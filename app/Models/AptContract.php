<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AptContract extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'apt_id',
        'client_id',
        'price',
        'amount',
        'paid',
        'debt',
        'days_missed'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function apartment() {
        return $this->belongsTo(Appartment::class, 'apt_id', 'id');
    }
}
