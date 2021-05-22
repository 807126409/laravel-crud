<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdFromFcstmrTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        First, update ID to column to type because 
        in the next migration, we have to add id column and we also don't want to lose our data.
        */
        if(Schema::hasTable('fcstmr_type') && Schema::hasColumn('fcstmr_type','ID')){   
            Schema::table('fcstmr_type', function (Blueprint $table) {
                $table->renameColumn('ID', 'type');
            });
        }
        /*renameColumn will work if we install "doctrine/dbal": "^2.13",
        or you can also ALTER Table Query Also
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('fcstmr_type') && Schema::hasColumn('fcstmr_type','type')){   
            Schema::table('fcstmr_type', function (Blueprint $table) {
                    $table->renameColumn('type','ID');
            });
        }
    }
}
