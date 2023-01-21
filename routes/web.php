<?php

use App\Domain\Ecommerce\Models\Product;
use App\Domain\Ecommerce\Models\Version;
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
    $product = Product::factory()->create();
    $version = Version::create([
        'product_id' => $product->id,
    ]);

    return $version->sku;

    return ['Invercio' => config('app.version')];
});

require __DIR__.'/auth.php';
