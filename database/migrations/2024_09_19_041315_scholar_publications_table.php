<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('scholar_publications', function (Blueprint $table) {
            $table->id();
            $table->string('author_id');
            $table->string('title');
            $table->string('journal_name')->nullable();
            $table->date('publication_date')->nullable();
            $table->integer('citations')->default(0);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('scholar_publications');
    }
};
