<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'expense_category_id',
        'date',
        'amount',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
    
}
