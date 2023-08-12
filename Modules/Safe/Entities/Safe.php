<?php

namespace Modules\Safe\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Safe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

}
