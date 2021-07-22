<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadGuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bad_guys', function (Blueprint $table) {
            $table->id();
                $table->string('bad_user');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('server_id')->constrained();
            $table->foreignId('rule_id')->constrained();
            $table->integer('punishment');
            $table->bigInteger('duration');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('bad_guys');
    }
}
