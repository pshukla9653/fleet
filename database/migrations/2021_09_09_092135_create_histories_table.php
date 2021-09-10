<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');    
            $table->unsignedBigInteger('booking_id')
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade');
            $table->string('user_email')->nullable(); 
            $table->string('event')->nullable();    
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
        Schema::dropIfExists('histories');
    }
}
