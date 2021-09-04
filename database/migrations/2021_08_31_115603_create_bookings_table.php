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
<<<<<<< HEAD
=======
            $table->unsignedBigInteger('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');
>>>>>>> c5ace80c8569c423ac230b622003a187affa78c0
            $table->date('start_date');
            $table->date('end_date');
            $table->string('booking_reference'); 
            $table->string('purpose_of_lone'); 
            $table->string('loan_type')->nullable(); 
            $table->string('booking_notes'); 
            $table->string('lag_time'); 
            $table->string('lag_notes'); 
            $table->string('lead_time'); 
            $table->string('lead_notes'); 
            $table->string('show_delivery_day'); 
            $table->string('show_collectioin_day'); 
            $table->string('contacts');
            $table->string('primary_contact');
            $table->string('vehicle');
            $table->string('email_temeplete');

            $table->string('ob_pick_from'); 
            $table->string('ob_pick_from_notes'); 
            $table->string('ob_deliver_to'); 
            $table->string('ob_deliver_to_address_1');
            $table->string('ob_deliver_to_town_city');
            $table->string('ob_deliver_to_post_code');
            $table->string('ob_deliver_to_deliver_notes');
            $table->string('ob_deliver_to_address_2');
            $table->string('ob_deliver_to_county');
            $table->string('ob_deliver_to_country');

            $table->string('ib_pick_from');
            $table->string('ib_pick_from_address_1');
            $table->string('ib_pick_from_town_city');
            $table->string('ib_pick_from_post_code');
            $table->string('ib_pick_from_address_2');
            $table->string('ib_pick_from_county');
            $table->string('ib_pick_from_country');
            $table->string('ib_pick_from_notes');
            $table->string('ib_deliver_to');
            $table->string('ib_deliver_to_notes');
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
