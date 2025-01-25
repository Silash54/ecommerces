<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * Get all of the Products for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
