<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //カラム名をstatus　VARCHAR(10)で設定。
            $table->string('status',10);
        });
    }
    
    
    public function down()
    {
       Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
    
}
