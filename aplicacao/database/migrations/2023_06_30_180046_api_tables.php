<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor', function (Blueprint $table) {
            $table->id();
            $table->string('MAC', 17);
            $table->float('corrente');
            $table->dateTime('data_hora_medicao');
            $table->float('qos');
            $table->timestamps();
            
        });


        Schema::create('log_erro', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->text('mensagem');
            $table->dateTime('data_hora');
            $table->string('log_erro_sensor_correspondente');
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id('id_sensor');
            $table->boolean('status_sensor');
            $table->string('DISPOSITIVO_TOPICO');
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
        Schema::dropIfExists('sensor');
        Schema::dropIfExists('log_erro');
        Schema::dropIfExists('status');
    }

    
};
