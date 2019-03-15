<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('mail')->unique()->comment('メールアドレス');
            $table->string('name1')->nullable()->comment('名字');
            $table->string('name2')->nullable()->comment('名前');
            $table->string('name_kana1')->nullable()->comment('名字(ふりがな)');
            $table->string('name_kana2')->nullable()->comment('名前(ふりがな)');
            $table->unsignedTinyInteger('sex_id')->comment('性別ID');
            $table->binary('password')->comment('パスワード');
            $table->string('salt')->comment('salt');
            $table->string('unique_id')->unique()->comment('ユニークID');
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
