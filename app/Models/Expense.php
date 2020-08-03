<?php

namespace App\Models;

use App\Models\ExpenseReport;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expenseReport(){
        return $this->belongsTo(ExpenseReport::class);
    }
}
