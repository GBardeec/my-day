<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'type', 'budget_categories_id',];

    const EXPENSE = 1;
    const INCOME = 2;
}
