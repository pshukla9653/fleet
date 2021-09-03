<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->string('list_id');
            $table->string('contact_id');
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
        Schema::dropIfExists('list_contacts');
    }
}
