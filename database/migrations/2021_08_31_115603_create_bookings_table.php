<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('booking_reference'); 
            $table->string('purpose_of_lone'); 
            $table->string('loan_type')->nullable(); 
            $table->string('booking_notes')->nullable(); 
            $table->string('lag_time')->nullable(); 
            $table->string('lag_notes')->nullable(); 
            $table->string('lead_time')->nullable(); 
            $table->string('lead_notes')->nullable(); 
            $table->string('show_delivery_day')->nullable(); 
            $table->string('show_collectioin_day')->nullable(); 
            $table->string('contacts')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('email_temeplete')->nullable();

            $table->string('ob_pick_from')->nullable(); 
            $table->string('ob_pick_from_notes')->nullable(); 
            $table->string('ob_deliver_to')->nullable(); 
            $table->string('ob_deliver_to_address_1')->nullable();
            $table->string('ob_deliver_to_town_city')->nullable();
            $table->string('ob_deliver_to_post_code')->nullable();
            $table->string('ob_deliver_to_deliver_notes')->nullable();
            $table->string('ob_deliver_to_address_2')->nullable();
            $table->string('ob_deliver_to_county')->nullable();
            $table->string('ob_deliver_to_country')->nullable();

            $table->string('ib_pick_from')->nullable();
            $table->string('ib_pick_from_address_1')->nullable();
            $table->string('ib_pick_from_town_city')->nullable();
            $table->string('ib_pick_from_post_code')->nullable();
            $table->string('ib_pick_from_address_2')->nullable();
            $table->string('ib_pick_from_county')->nullable();
            $table->string('ib_pick_from_country')->nullable();
            $table->string('ib_pick_from_notes')->nullable();
            $table->string('ib_deliver_to')->nullable();
            $table->string('ib_deliver_to_notes')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
