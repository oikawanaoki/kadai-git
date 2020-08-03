<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_status_to_tasks_table', function (Blueprint $table) {
            //カラム名をstatus　VARCHAR(10)で設定。
            $table->string('status',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_status_to_tasks_table', function (Blueprint $table) {
            $table->dropColumn('status');
            //
        });
    }
}
