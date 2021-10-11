<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','alamat'];
    /**
     * Get all of the comments for the cust
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasing()
    {
        return $this->hasMany(purchasing::class, 'purchasing_id', 'id');
    }
}
