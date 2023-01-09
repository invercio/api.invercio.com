<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $locales = collect(['en', 'es', 'fr']);

    $keys = collect(Arr::dot([
        'auth' => trans('auth', locale: 'en'),
        'pagination' => trans('pagination', locale: 'en'),
        'passwords' => trans('passwords', locale: 'en'),
        'validation' => trans('validation', locale: 'en'),
    ]))->keys()->map(function ($key) use ($locales) {
        $arr = collect([
            'key' => $key,
        ]);
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

        return $arr->merge($l);
    });

    return $keys;

    return ['Invercio' => config('app.version')];
});

require __DIR__.'/auth.php';
