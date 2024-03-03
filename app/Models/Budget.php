<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['values', 'type','date_at', 'user_id'];

    public $casts = [
        'values' => 'json',
        'date_at' => 'datetime'
    ];

    const EXPENSE = 1;
    const INCOME = 2;
}
