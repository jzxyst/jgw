<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \App\Enums\Position;

class CreateUsersTable extends Migration
{
    private $table_name = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('user_id')->comment('ユーザID');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('first_name')->nullable()->comment('名前');
            $table->string('last_name')->nullable()->comment('名字');
            $table->unsignedTinyInteger('sex_id')->comment('性別ID');
            $table->unsignedSmallInteger('position_id')->default(Position::NotSet)->comment('役職ID');
            $table->string('password')->comment('パスワード');
            $table->string('unique_id')->unique()->comment('ユニークID');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists($this->table_name);
    }
}
