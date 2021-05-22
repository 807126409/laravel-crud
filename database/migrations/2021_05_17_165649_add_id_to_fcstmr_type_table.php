<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToFcstmrTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*add increment ID column in fcstmr_type*/
        if(Schema::hasTable('fcstmr_type')){   
            Schema::table('fcstmr_type', function (Blueprint $table) {
                $table->unsignedInteger('id',true)->first();
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
        if(Schema::hasTable('fcstmr_type') && Schema::hasColumn('fcstmr_type','ID')){   
            Schema::table('fcstmr_type', function (Blueprint $table) {
                    $table->dropColumn('id');
            });
        }
    }
}
