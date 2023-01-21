<?php

declare(strict_types=1);

namespace App\Domain\Ecommerce\Models;

use App\Domain\App\Concerns\HasSku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Version extends Model
{
    use HasSku;

    protected $guarded = [];

    //region Relationships
    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    //endregion
}
