<?php namespace App\TimeEntries\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('app_timeentries_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->integer('task_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_timeentries_time_entries');
    }
}
