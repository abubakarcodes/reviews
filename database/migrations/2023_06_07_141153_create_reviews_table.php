<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companyId')->nullable();
            $table->string('manager')->nullable();
            $table->string('group1')->nullable();
            $table->string('group2')->nullable();
            $table->string('group3')->nullable();
            $table->string('city1')->nullable();
            $table->string('city2')->nullable();
            $table->string('city3')->nullable();
            $table->text('review')->nullable();
            $table->text('discussion')->nullable();
            $table->text('response')->nullable();
            $table->integer('communication')->default(0);
            $table->integer('professionalism')->default(0);
            $table->integer('expertise')->default(0);
            $table->double('overall', places: 1)->default(0);
            $table->boolean('isApproved')->default(false);
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
        Schema::dropIfExists('reviews');
    }
}
