<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->string('cv_file')->nullable();


            $table->boolean('is_accepted')->default(0);
            $table->boolean('nomination_status')->default(0);

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('award_season_id')->index();
            $table->foreign('award_season_id')->references('id')->on('award_seasons');

            $table->unsignedBigInteger('award_id')->index();
            $table->foreign('award_id')->references('id')->on('awards');

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
        Schema::dropIfExists('applications');
    }
}
