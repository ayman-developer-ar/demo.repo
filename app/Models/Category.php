<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function product()
    {
        return $this->HasMany(Product::class);
    }
    //
}
