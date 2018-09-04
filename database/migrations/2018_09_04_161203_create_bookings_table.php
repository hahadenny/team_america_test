<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbooking', function (Blueprint $table) {
            $table->increments('resnum');
			$table->string('agcode', 10)->default('')->index('idxagcode');
			$table->date('bookingdate')->index('idxbookingdate');
			$table->char('status', 2)->nullable();
			$table->string('invnum', 20)->nullable();
			$table->string('clientref', 25)->nullable();
			$table->string('username', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblbooking');
    }
}
