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
            $table->string('booking_code')->nullable();
            $table->foreignId('customer_id')->constrained('customer');
            $table->decimal('price',10,2)->nullable();
            $table->string('promocode')->nullable();
            $table->string('vehicle_reg')->nullable();
            $table->string('vehicle_manufacturer')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('vehicle_color' )->nullable();
            $table->json('image' )->nullable();
            $table->date('parking_from_date')->nullable();
            $table->date('parking_till_date' )->nullable();
            $table->integer('inbound_terminal')->nullable();
            $table->integer('outbound_terminal')->nullable();
            $table->string('inbound_flight_number' )->nullable();
            $table->string('outbound_flight_number')->nullable();
            $table->time('flight_arrival_time')->nullable();
            $table->date('flight_arrival_date')->nullable();
            $table->time('flight_departure_time')->nullable();
            $table->date('flight_departure_date' )->nullable();
            $table->integer('parking_from_hour' )->nullable();
            $table->integer('parking_from_min' )->nullable();
            $table->integer('parking_till_hour' )->nullable();
            $table->integer('parking_till_min' )->nullable();
            $table->string('airport' )->nullable();
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
