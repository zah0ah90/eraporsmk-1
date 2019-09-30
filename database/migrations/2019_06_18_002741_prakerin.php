<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prakerin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prakerin', function (Blueprint $table) {
			$table->uuid('prakerin_id');
			$table->uuid('sekolah_id');
			$table->uuid('anggota_rombel_id');
			$table->string('mitra_prakerin')->nullable();
			$table->string('lokasi_prakerin')->nullable();
			$table->string('lama_prakerin')->nullable();
			$table->text('keterangan_prakerin')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->timestamp('last_sync');
			$table->primary('prakerin_id');
			$table->foreign('sekolah_id')->references('sekolah_id')->on('sekolah')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('anggota_rombel_id')->references('anggota_rombel_id')->on('anggota_rombel')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prakerin');
    }
}