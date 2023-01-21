<?php

declare(strict_types=1);

namespace App\Domain\App\Concerns;

use App\Domain\Ecommerce\Models\Version;
use Illuminate\Support\Str;

trait HasSku
{
    public static function bootHasSku(): void
    {
        static::creating(function (Version $model) {
            $model->sku ??= Str::uuid()->getHex()->toString();
            while (Version::where('sku', $model->sku)->exists()) {
                $model->sku ??= Str::uuid()->getHex()->toString();
            }
        });
    }
}
