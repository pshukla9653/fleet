<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index();
			$table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table->string('model');
            $table->string('derivative');
            $table->string('registration_number');
            $table->float('loan_cost', 10, 2)->nullable();
            $table->string('registration_plate_colour');
            $table->string('vin');
            $table->date('adoption_date');
            $table->date('projected_defleet_date');
            $table->string('lead_time')->nullable();
            $table->string('lag_time')->nullable();
            $table->string('engine')->nullable();
            $table->string('colour')->nullable();
            $table->string('mileage')->nullable();
            $table->float('value', 10, 2)->nullable();
            $table->string('order_number')->nullable();
            $table->text('other_details')->nullable();
            $table->text('notes')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    

        Schema::create('vehicle_specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->index();
			$table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
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
        Schema::dropIfExists('vehicles');
    }
}
