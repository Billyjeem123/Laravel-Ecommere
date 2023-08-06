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
        // Drop the 'images' table if it exists
        Schema::dropIfExists('images');

        // Recreate the 'images' table with the desired changes
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('imageUrl');
            $table->string('imageName');
            $table->integer('token')->before('imageName');
            // Add other columns if necessary

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
        Schema::table('images', function (Blueprint $table) {
            //
        });
    }
};
