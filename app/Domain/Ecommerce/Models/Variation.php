<?php

declare(strict_types=1);

namespace App\Domain\Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variation extends Model
{
    protected $guarded = [];

    //region Relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    //endregion
}
