<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblitem', function (Blueprint $table) {
            $table->integer('resnum')->unsigned()->default(0)->index('idxresnum');
			$table->increments('itemid');
			$table->string('pcode', 10)->default('')->index('idxpcode');
			$table->date('depdate')->index('idxdepdate');
			$table->string('description', 80)->nullable();
			$table->smallInteger('qty')->unsigned()->nullable();
			$table->smallInteger('occupancy')->nullable();
			$table->decimal('price')->nullable();
			$table->char('status', 2)->nullable();
			$table->integer('vendorid')->nullable();
			$table->smallInteger('nights')->unsigned()->nullable();
			$table->string('supplierref', 14)->nullable();
			$table->dateTime('datetimecreated');
			$table->timestamp('datetimemodified')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblitem');
    }
}
