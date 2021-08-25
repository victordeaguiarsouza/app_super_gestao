<?php

use App\Models\Motivo;
use Database\Seeders\MotivoSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        (new MotivoSeeder())->run();

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivos_id')->after('id');
        });

        DB::statement('update site_contatos set motivos_id = motivo');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_id')->references('id')->on('motivos');
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo');
            $table->dropForeign('site_contatos_motivos_id_foreign');
        });

        DB::statement('update site_contatos set motivo = motivos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_id');
        });

        Motivo::truncate();
    }
}
