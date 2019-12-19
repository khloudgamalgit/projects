<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProsuctsTable extends Migration
{
    public function up()
    {
        Schema::create('prosucts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('pro_name');
			$table->string('pro_code');
			$table->float('pro_price');
			$table->text('pro_info');
			$table->string('image')->nullable();
		    $table->integer('sp1_price');
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
        Schema::dropIfExists('prosucts');
    }
}
