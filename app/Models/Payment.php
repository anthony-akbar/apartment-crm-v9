<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function client() {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function article() {
        return $this->hasOne(PaymentArticle::class, 'id', 'article_id');
    }

    public function contract() {
        return $this->hasOne(AptContract::class,'id', 'contract_id');
    }
}
