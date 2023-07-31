<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    protected $fillable = ['title', 'price', 'available', 'sold'];
    use HasFactory;
}
