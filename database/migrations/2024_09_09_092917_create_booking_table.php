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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->foreignId('customer_id')->constrained('customer');
            $table->decimal('price',10,2);
            $table->foreignId('promocode_id')->constrained('promocodes');
            $table->string('vehicle_reg');
            $table->string('vehicle_manufacturer')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_color' )->nullable();
            $table->json('image' )->nullable();
            $table->date('parking_from_date');
            $table->time('parking_from_time');
            $table->date('parking_till_date' );
            $table->time('parking_till_time' );
            $table->integer('inbound_terminal');
            $table->integer('outbound_terminal');
            $table->string('inbound_flight_number' );
            $table->string('outbound_flight_number');
            $table->time('flight_arrival_time');
            $table->date('flight_arrival_date');
            $table->time('flight_departure_time');
            $table->date('flight_departure_date' );
            $table->string('airport' );
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
