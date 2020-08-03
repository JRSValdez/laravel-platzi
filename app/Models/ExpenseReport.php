<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
