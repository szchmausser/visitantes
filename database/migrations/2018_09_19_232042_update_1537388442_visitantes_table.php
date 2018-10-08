<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537388442VisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            if(Schema::hasColumn('visitantes', 'fecha_salida')) {
                $table->dropColumn('fecha_salida');
            }
            
        });
Schema::table('visitantes', function (Blueprint $table) {
            
if (!Schema::hasColumn('visitantes', 'fecha_salida')) {
                $table->string('fecha_salida')->nullable();
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
            $table->dropColumn('fecha_salida');
            
        });
Schema::table('visitantes', function (Blueprint $table) {
                        $table->datetime('fecha_salida')->nullable();
                
        });

    }
}
