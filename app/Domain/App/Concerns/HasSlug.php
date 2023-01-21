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
            $model->slug ??= Str::slug(Str::limit($model->name, 80)) - Str::random(5);
            while (Product::where('slug', $model->slug)->exists()) {
                $model->slug ??= Str::slug($model->name).'-'.Str::random(5);
            }
        });
    }
}
