<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->uuid('sku')->unique();
            $table->unsignedInteger('stock')
                ->nullable()
                ->default(null);
            $table->integer('price')->default(0);
            $table->timestamps();
        });

        Schema::create('variation_version', function (Blueprint $table) {
            $table->foreignId('variation_id')->constrained();
            $table->foreignId('version_id')->constrained();
            $table->unique(['variation_id', 'version_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('versions');
    }
};
