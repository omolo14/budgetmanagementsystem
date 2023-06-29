<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'amount',
        'fees',
        'file',
        'status',
        'createdby',
        'updatedby',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];
}
