<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('question_text');
            $table->string('choice_1');
            $table->string('choice_2');
            $table->string('choice_3');
            $table->unsignedInteger('choice_1_votes')->default(0);
            $table->unsignedInteger('choice_2_votes')->default(0);
            $table->unsignedInteger('choice_3_votes')->default(0);
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
        Schema::dropIfExists('polls');
    }
}
