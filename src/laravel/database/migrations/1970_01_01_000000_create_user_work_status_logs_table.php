<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkStatusLogsTable extends Migration
{
    private $table_name = 'user_work_status_logs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('user_work_status_log_id')->comment('ユーザ勤怠ステータスID');
            $table->unsignedInteger('user_id')->comment('ユーザID')->index();
            $table->unsignedInteger('work_state_id')->comment('勤怠ステータスID');
            $table->unsignedInteger('prev_user_work_status_log_id')->nullable()->comment('直近勤怠ステータスID');
            $table->unsignedInteger('next_user_work_status_log_id')->nullable()->comment('直後勤怠ステータスID');
            $table->timestamp('punched_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('打刻時刻');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
