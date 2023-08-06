<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproduct', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('productQuantity');
            $table->decimal('price', 12,2);
            $table->string('token');
            $table->string('productDesc');
            $table->foreignId('catid')->constrained('tblcategory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblproduct');
    }
};
