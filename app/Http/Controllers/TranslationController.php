<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Arr;
use Lang;

class TranslationController extends Controller
{
    public function index()
    {
        $locales = collect(['en', 'es', 'fr']);

        $keys = collect(Arr::dot([
            'auth' => trans('auth', locale: 'en'),
            'pagination' => trans('pagination', locale: 'en'),
            'passwords' => trans('passwords', locale: 'en'),
            'validation' => trans('validation', locale: 'en'),
        ]))->keys()->map(function ($key) use ($locales) {
            $l = $locales->map(function ($locale) use ($key) {
                $value = trans($key, locale: $locale);
                preg_match_all('/:\w+/', $value, $matches, PREG_SET_ORDER);
                $matches = collect(array_filter($matches))->flatten();

                return [
                    $locale => [
                        'exists' => Lang::has($key, locale: $locale, fallback: false),
                        'value' => $value,
                        'attributes' => $matches,
                    ],
                ];
            })->collapse();

            $arr = collect([
                'key' => $key,
                'needs_work' => $l->filter(fn ($v) => ! $v['exists'])->count() > 0,

            ]);

            return $arr->merge($l);
        });

        return $keys
            ->filter(fn ($v) => $v['needs_work'])
            ->paginate(10);
    }
}
