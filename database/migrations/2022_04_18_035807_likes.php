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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_movie')->nullable();
            $table->integer('id_comment')->nullable();
            $table->string('pseudo');
            $table->boolean('likeplus')->nullable();
            $table->boolean('likemoins')->nullable();
            $table->timestamps();
            
        // $table->foreign('id_movie')->references('id')->on('movies');
        // $table->foreign('id_comment')->references('id')->on('comments');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
    }
};
