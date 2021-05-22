<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcstmrTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*This is the initial migration file before starting the task of update table, 
        it will first check if a table exist then don't create a new table*/
        if (!Schema::hasTable('fcstmr_type')) {
            Schema::create('fcstmr_type', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->char('ID',2)->nullable();
                $table->char('NAME', 30)->nullable();
                $table->integer('magento_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fcstmr_type');
    }
}
