<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','type','user_id'];

    const EXPENSE = 1;
    const INCOME = 2;


}
