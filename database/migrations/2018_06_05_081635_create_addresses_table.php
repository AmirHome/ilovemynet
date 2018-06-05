<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('addresses',function(Blueprint $table){
            $table->increments("id");
            $table->text("address");
            $table->string("post_code");
            $table->string("city_name");
            $table->string("country_name");
            $table->integer("persons_id")->references("id")->on("persons");
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
        Schema::drop('addresses');
    }

}