<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('phone', 15);
            $table->string('profession', 50);
            $table->string('image', 35)->nullable(true);
            $table->string('session', 25)->nullable(true);
            $table->double('fee', 8, 2);
            $table->text('address');
            $table->tinyInteger('is_active')->default(1)->comment('0=no,1=yes');
            $table->boolean('is_delete')->default(0)->comment('0=no,1=yes');
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
        Schema::dropIfExists('celebrations');
    }
}
