<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1537385554VisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            if(Schema::hasColumn('visitantes', 'ci')) {
                $table->dropColumn('ci');
            }
            
        });
Schema::table('visitantes', function (Blueprint $table) {
            
if (!Schema::hasColumn('visitantes', 'ci')) {
                $table->string('ci');
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
            $table->dropColumn('ci');
            
        });
Schema::table('visitantes', function (Blueprint $table) {
                        $table->integer('ci')->nullable();
                
        });

    }
}
