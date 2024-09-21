<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAuthorPublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('author_publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author_name')->nullable();
            $table->string('journal_name')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('doi')->nullable();
            $table->integer('citations')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('author_publications');
    }
}
