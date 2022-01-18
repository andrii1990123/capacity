<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('branch_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('county');
            $table->string('postcode');
            $table->string('branch_manager');
            $table->text('link_with_solicitor');
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
        Schema::dropIfExists('estate_agents');
    }
}
