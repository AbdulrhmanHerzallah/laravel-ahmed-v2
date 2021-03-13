<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_awards', function (Blueprint $table) {
            $table->id();

            $table->enum('writer_type', ['personal', 'company'])->nullable()->default('personal');

            $table->string('found_name')->nullable();
            $table->string('found_work_business')->nullable();
            $table->string('found_administrator_name')->nullable();
            $table->string('found_location')->nullable();
            $table->string('found_phone')->nullable();
            $table->string('found_tel')->nullable();

            $table->string('title');
            $table->string('lang');

            $table->string('field')->nullable();
            $table->text('book_important')->nullable();
            $table->text('book_add_value')->nullable();
            $table->text('book_summary')->nullable();
            $table->date('date_writing_book')->nullable();
            $table->date('date_writing_last_book')->nullable();
            $table->integer('book_count')->nullable();
            $table->string('deposit_number')->nullable();
            $table->string('writer_name');
            $table->string('publishing_house')->nullable();
            $table->string('pdf');

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
        Schema::dropIfExists('writer_awards');
    }
}
