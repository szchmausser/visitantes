<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537451581VisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            if(Schema::hasColumn('visitantes', 'fecha_ingreso')) {
                $table->dropColumn('fecha_ingreso');
            }
            if(Schema::hasColumn('visitantes', 'fecha_salida')) {
                $table->dropColumn('fecha_salida');
            }
            
        });
Schema::table('visitantes', function (Blueprint $table) {
            
if (!Schema::hasColumn('visitantes', 'fecha_entrada')) {
                $table->datetime('fecha_entrada')->nullable();
                }
if (!Schema::hasColumn('visitantes', 'fecha_salida')) {
                $table->datetime('fecha_salida')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            $table->dropColumn('fecha_entrada');
            $table->dropColumn('fecha_salida');
            
        });
Schema::table('visitantes', function (Blueprint $table) {
                        $table->datetime('fecha_ingreso')->nullable();
                $table->string('fecha_salida')->nullable();
                
        });

    }
}
