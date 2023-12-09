<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function client() {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function commercial() {
        return $this->hasOne(Commercial::class, 'id', 'com_id');
    }

}
