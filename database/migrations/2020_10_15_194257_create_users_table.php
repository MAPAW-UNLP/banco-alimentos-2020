<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('users', function (Blueprint $table) {
$table->bigIncrements('id');
$table->string('name');
$table->string('apellido')->nullable();
$table->string('email')->unique();
$table->string('dni')->nullable();
$table->string('telefono')->nullable();
$table->string('password');
$table->integer('estado');
$table->rememberToken();
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
Schema::dropIfExists('users');
}
}
