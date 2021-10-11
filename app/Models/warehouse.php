<?php

namespace App\Models;

use App\Models\stok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class warehouse extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function stok()
    {
        return $this->hasMany(stok::class, 'warehouse_id', 'id');
    }
}
