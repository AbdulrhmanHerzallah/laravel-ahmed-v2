<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_seasons', function (Blueprint $table) {
            $table->id();

            $table->string('season_name')->index();
            $table->string('slug')->index();

            $table->unsignedBigInteger('award_id')->nullable()->index();
            $table->foreign('award_id')->references('id')->on('awards');

            $table->timestamp('start_date', 0)->nullable();
            $table->timestamp('end_date', 0)->nullable();
            $table->timestamp('advertising_date', 0)->nullable();

            $table->softDeletes();

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
        Schema::dropIfExists('award_seasons');
    }
}
