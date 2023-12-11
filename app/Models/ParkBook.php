<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function client() {
        return $this->hasOne(Client::class, 'id', 'client_id')->get()[0];
    }

    public function parking() {
        return $this->hasOne(Parking::class, 'id', 'park_id')->get()[0];
    }
}
