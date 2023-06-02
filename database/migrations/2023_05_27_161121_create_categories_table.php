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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('cover')->default('/main/image/defult/default-cover.png') ;
            $table->string('icon')->default('geo-alt');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent')->default(0);
            $table->timestamps();
        });


        Schema::create('category_location', function (Blueprint $table) {

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');


            $table->primary(['category_id' , 'location_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_location ');
        Schema::dropIfExists('categories');
    }
};
