<?php

namespace App\Models;

use App\Models\product;
use App\Models\warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stok extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','warehouse_id','jumlah'];
    /**
     * Get the produk that owns the stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(warehouse::class, 'warehouse_id', 'id');
    }
}
