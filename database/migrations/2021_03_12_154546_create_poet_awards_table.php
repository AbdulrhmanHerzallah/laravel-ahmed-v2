<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoetAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poet_awards', function (Blueprint $table) {
            $table->id();

            $table->string('doc_file')->nullable();

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
        Schema::dropIfExists('poet_awards');
    }
}
