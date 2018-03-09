<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object_type');
            $table->unsignedInteger('object_id');
            $table->string('content_type');
            $table->string('identifier');
            $table->unsignedInteger('content_id');
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
            $table->unique([
                "object_type",
                "object_id",
                "identifier",
                "language_id"
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('contents');
    }
}
