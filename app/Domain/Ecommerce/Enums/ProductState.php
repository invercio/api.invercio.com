<?php

declare(strict_types=1);

namespace App\Domain\Ecommerce\Enums;

enum ProductState: string
{
    case Draft = 'draft';
    case Published = 'published';
}
