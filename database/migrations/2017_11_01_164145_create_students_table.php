<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('phone');
        });

        $data = array(
            array('name'=>'Brad Pit', 'phone'=> '83660520'),
            array('name'=>'Tom Cruise', 'phone'=> '91886929'),
            array('name'=>'James Bond', 'phone'=> '97985397')

        );
        
        DB::table('students')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
