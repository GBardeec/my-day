<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'type', 'budget_category_id','started_at','ended_at', 'user_id'];

    public $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    const EXPENSE = 1;
    const INCOME = 2;
}
