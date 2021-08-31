<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index();
			$table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->string('description');
            $table->string('subject');
            $table->string('from_name'); 
            $table->string('reply_to_email'); 
            $table->string('from_email');
            $table->string('to_email');
            $table->string('cc_email');
            $table->string('bcc_email'); 
            $table->string('status');
            $table->text('email_body');
            $table->string('is_spec');     
            $table->timestamps();
        });

        Schema::create('email_file', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id')->index();
			$table->foreign('template_id')
                ->references('id')
                ->on('email_templates')
                ->onDelete('cascade');
            $table->string('file_name');
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
        Schema::dropIfExists('email_templates');
        Schema::dropIfExists('email_file');
    }
}
