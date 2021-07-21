<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('company_name')->nullable();
			$table->string('job_title')->nullable();
			$table->string('email')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('address1')->nullable();
			$table->string('address2')->nullable();
			$table->string('address3')->nullable();
			$table->string('city')->nullable();
			$table->string('country')->nullable();
			$table->string('post_code')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
