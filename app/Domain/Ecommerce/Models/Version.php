<?php

declare(strict_types=1);

namespace App\Domain\Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Version extends Model
{
    protected $guarded = [];

    public function variations(): BelongsToMany
    {
        return $this->belongsToMany(Variation::class);
    }
}
