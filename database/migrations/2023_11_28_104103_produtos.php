<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user');
            $table->double('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('image', 255)->nullable();

            $table->foreign('user')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnUpdate();

            $table->unsignedBigInteger('cat');
            $table->foreign('cat')->references('id')->on('categories');

            $table->unsignedBigInteger('brand');
            $table->foreign('brand')->references('id')->on('brands');

            $table->smallInteger('qtd');
            $table->string('sku')->comment("Lote");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
