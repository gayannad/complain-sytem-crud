<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complain extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_PENDING = 0;
    const STATUS_RESOLVED = 1;

    protected $fillable = ['customer_name', 'customer_age', 'customer_address', 'problem_description', 'date', 'status'];
}
