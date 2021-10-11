<?php

namespace App\Models;

use App\Models\stok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'satuan'];
    /**
     * Get all of the comments for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stok()
    {
        return $this->hasMany(stok::class, 'product_id', 'id');
    }
}
