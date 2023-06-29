<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'type_id',
        'type',
        'status',
        'createdby',
        'updatedby',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];
}
