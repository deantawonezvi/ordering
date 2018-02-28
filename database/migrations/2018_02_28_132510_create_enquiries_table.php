<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('enquiries', function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('enquiry_type_id');
            $table->foreign('enquiry_type_id')->references('id')->on('enquiry_types');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('description');

            $table->text('instructions');

            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('enquiries');
    }
}
