<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'name',
        'fathersname',
        'gender',
        'birth',
        'passportId',
        'given',
        'givendate',
        'address',
        'phone',
        'status',
        'pin',
        'email',
    ];

    public function contracts() {
        return $this->hasMany(AptContract::class, 'client_id', 'id');
    }

    public function payments() {
        return $this->hasMany(Payment::class, 'client_id', 'id');
    }
}
