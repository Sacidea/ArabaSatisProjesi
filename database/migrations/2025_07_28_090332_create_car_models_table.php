<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');//foreign key
            $table->string('name');

            $table->softDeletes();
            $table->timestamps();
            //foreign key nereden alınacak sütun ,tablo ,tablodaki_sütun,
            // eğer silinirse parent->child yönünde silme
            $table->foreign('brand_id')->on('car_models')->references('id')->onDelete('cascade)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
