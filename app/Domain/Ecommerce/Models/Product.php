<?php

declare(strict_types=1);

namespace App\Domain\Ecommerce\Models;

use App\Domain\Ecommerce\Enums\ProductState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'state' => ProductState::class,
    ];

    //region Relationships
    public function variations(): HasMany
    {
        return $this->hasMany(Variation::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(Version::class);
    }
    //endregion
}
