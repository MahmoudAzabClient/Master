<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsItemSpec7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PsItemSpec7', function (Blueprint $table) {
            $table->integer('is7_id');
			$table->string('is7_code');
			$table->string('is7_name1');
			$table->string('is7_name2');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PsItemSpec7');
    }
}
