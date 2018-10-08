<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1537383604VisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('visitantes')) {
            Schema::create('visitantes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('ci')->nullable();
                $table->string('nombres_apellidos');
                $table->string('telefono')->nullable();
                $table->datetime('fecha_ingreso')->nullable();
                $table->string('procedencia');
                $table->string('motivo');
                $table->datetime('fecha_salida')->nullable();
                $table->string('observaciones')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('visitantes');
    }
}
