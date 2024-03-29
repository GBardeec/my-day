<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    use HasFactory;

    protected $fillable = ['plans', 'type', 'started_at','ended_at', 'user_id'];

    public $casts = [
        'plans' => 'json',
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    const EXPENSE = 1;
    const INCOME = 2;
}
