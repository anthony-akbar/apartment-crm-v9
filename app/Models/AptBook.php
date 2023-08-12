<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AptBook extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'apt_id',
        'client_id',
        'status',
        'until',
        'paid'
    ];

    public function apartment()
    {

        return $this->hasOne(Apartment::class, 'id', 'apt_id');
    }

    public function client()
    {

        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
