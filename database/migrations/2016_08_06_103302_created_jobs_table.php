<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('job_id');
            # Standard Columns
            $table->text('name');
            $table->mediumText('description');
            # Relations
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            # Flags
            $table->boolean('is_visible')->default(0);
            $table->boolean('is_moderated')->default(0);
            # Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}
