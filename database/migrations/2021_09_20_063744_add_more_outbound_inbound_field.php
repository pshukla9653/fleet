<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreOutboundInboundField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
            $table->string('ob_pick_from_address_1')->nullable();
            $table->string('ob_pick_from_town_city')->nullable();
            $table->string('ob_pick_from_post_code')->nullable();
            $table->string('ob_pick_from_deliver_notes')->nullable();
            $table->string('ob_pick_from_address_2')->nullable();
            $table->string('ob_pick_from_county')->nullable();
            $table->string('ob_pick_from_country')->nullable();
            $table->string('ob_deliver_to_notes')->nullable();
            $table->string('ib_deliver_to_address_1')->nullable();
            $table->string('ib_deliver_to_town_city')->nullable();
            $table->string('ib_deliver_to_post_code')->nullable();
            $table->string('ib_deliver_to_address_2')->nullable();
            $table->string('ib_deliver_to_county')->nullable();
            $table->string('ib_deliver_to_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
