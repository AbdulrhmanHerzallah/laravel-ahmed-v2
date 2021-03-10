<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_subjects', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('body')->nullable();

            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->date('date_event')->nullable();
            $table->string('location_event')->nullable();

            $table->string('slug')->nullable();

            $table->unsignedBigInteger('tab_id')->index()->nullable();
            $table->foreign('tab_id')->references('id')->on('tabs')
                ->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('tab_subjects');
    }
}
