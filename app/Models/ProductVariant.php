<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    protected $fillable = [
        'measure'
    ];

    public function product()
    {
        return $this->HasMany(Product::class);
    }
    //
}
