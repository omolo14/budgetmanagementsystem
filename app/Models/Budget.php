<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Expense;

class Budget extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'expenses_id', 
        'file', 
        'amount',
        'updated_at'
    ];

    protected $dates = ['deleted_at', 'date'];
    // protected $dates = ['date'];

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expenses_id');
    }
}
