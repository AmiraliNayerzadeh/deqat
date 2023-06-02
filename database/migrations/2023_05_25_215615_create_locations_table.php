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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('slug');
            $table->text('logo')->default('/main/image/defult/default-profile-icon.jpg');
            $table->text('cover')->nullable();
            $table->text('map');
            $table->longText('description')->nullable();
            $table->string('phone') ;
            $table->string('address') ;
            $table->string('phoneSec')->nullable() ;
            $table->string('email')->nullable() ;
            $table->string('instagram')->nullable() ;
            $table->string('linkedin')->nullable() ;
            $table->string('twitter')->nullable() ;
            $table->string('web')->nullable() ;
            $table->string('video')->nullable() ;

            $table->unsignedBigInteger('city_id')->nullable() ;
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable() ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
