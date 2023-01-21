<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->string('type');
            $table->string('option');
            $table->unique(['product_id', 'type', 'option']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('variations');
    }
};
