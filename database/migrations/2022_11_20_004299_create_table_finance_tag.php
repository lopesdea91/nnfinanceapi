<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	private $nameTable = 'finance_tag';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->nameTable, function (Blueprint $table) {
			$table->id('id');
			$table->string('description');
			// $table->enum('enable', [1, 0])->default(1);
			$table->foreignId('type_id')->references('id')->on('finance_type');
			$table->foreignId('wallet_id')->references('id')->on('finance_wallet');
			// $table->foreignId('user_id')->references('id')->on('users');
			$table->softDeletes();
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->nameTable);
	}
};
