<?php

declare(strict_types=1);

namespace App\Domain\App\Concerns;

use App\Domain\Ecommerce\Models\Product;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::creating(function (Product $model) {
            $model->slug ??= Str::slug(
                Str::limit($model->name, 75).'-'.Str::random(6)
            );
        });
    }
}
