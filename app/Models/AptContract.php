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
        'days_missed',
        'currency',
        'created_at'
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function apartment() {
        return $this->belongsTo(Apartment::class, 'apt_id', 'id');
    }

    public function schedule() {
        return $this->hasMany(Schedule::class,'contract_id', 'id');
    }
}
