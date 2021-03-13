<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalSeasonAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_season_awards', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('body')->nullable();

            $table->unsignedBigInteger('application_id')->index()->nullable();
            $table->foreign('application_id')->references('id')->on('applications')
                ->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('personal_season_awards');
    }
}
