<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblagency', function (Blueprint $table) {
            $table->string('agcode', 10)->default('')->primary();
			$table->string('agname', 100);
			$table->string('phone', 20)->nullable();
			$table->string('add1', 50)->nullable();
			$table->string('add2', 50)->nullable();
			$table->string('city', 20)->nullable();
			$table->char('state', 2)->nullable();
			$table->string('ZIP', 13)->nullable();
			$table->boolean('country')->default(0);
			$table->string('email', 50)->nullable();
			$table->string('URL', 75)->nullable();
			$table->boolean('active')->nullable();
			$table->date('registereddate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblagency');
    }
}
