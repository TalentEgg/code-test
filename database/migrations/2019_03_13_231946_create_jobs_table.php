<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('overview');
            $table->text('duties');
            $table->text('qualifications');
            $table->string('reports_to', 100);
            $table->string('location');
            $table->double('compensation', 8, 2);
            $table->enum('compensation_unit', ['per year', 'per hour']);
            $table->enum('employment_type', ['part time', 'full time', 'contract']);
            $table->softDeletes();
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
        Schema::dropIfExists('jobs');
    }
}
