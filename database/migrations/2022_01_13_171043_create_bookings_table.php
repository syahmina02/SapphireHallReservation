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
            $table->date('date_booking');
            $table->string('time');
            $table->string('notes');
            $table->text('sessions');
            $table->string('user_id')->constraint('users')->onDelete("cascade");
            $table->string('hall_id')->constraint('halls')->onDelete("cascade");
            $table->string('package_id')->constraint('packages')->onDelete("cascade");
            $table->string('status');
            $table->string('theme');
            $table->string('totalPrice')->default(0);
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
