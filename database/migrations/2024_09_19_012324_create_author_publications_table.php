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
            $table->string('author_name');            
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('author_publications');
    }
}
