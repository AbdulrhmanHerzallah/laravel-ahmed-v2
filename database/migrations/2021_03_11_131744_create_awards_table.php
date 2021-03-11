<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('slug')->index();
            $table->text('desc');

            $table->string('img')->nullable();

            $table->text('award_detail_desc')->nullable();
            $table->text('filtering_mechanism_desc')->nullable();
            $table->text('conditions_desc')->nullable();
            $table->text('subject_desc')->nullable();
            $table->text('registration_date_desc')->nullable();
            $table->text('winner_desc')->nullable();

            $table->enum('award_type', ['free', 'poet', 'writer', 'personality']);

            $table->enum('steps', ['one', 'two'])->default('one');

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
        Schema::dropIfExists('awards');
    }
}
