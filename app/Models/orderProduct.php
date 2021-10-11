<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;
    protected $fillable = ['purchasing_id','product_id', 'jumlah', 'status'];
}
