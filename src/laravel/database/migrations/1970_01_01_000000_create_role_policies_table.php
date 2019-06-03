<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAbilitiesTable extends Migration
{
    private $table_name = 'role_policies';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('role_policy_id')->comment('ロールポリシーID');
            $table->unsignedInteger('role_id')->comment('ロールID');
            $table->unsignedInteger('policy_id')->comment('ポリシーID');
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
