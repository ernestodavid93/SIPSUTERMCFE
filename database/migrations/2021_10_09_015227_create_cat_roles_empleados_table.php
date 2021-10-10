<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatRolesEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_roles_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_empleado_F');
            $table->foreign('Id_empleado_F')->references('id')->on('empleados')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('Id_rol_F');
            $table->foreign('Id_rol_F')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cat_roles_empleados');
        Schema::table('cat_roles_empleados', function (Blueprint $table) {
            $table->dropForeign(['Id_empleado_F']);
            $table->dropColumn('Id_empleado_F');

            $table->dropForeign(['Id_rol_F']);
            $table->dropColumn('Id_rol_F');

            
        });

    }
}
