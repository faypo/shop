<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMerchandisesTable.
 */
class CreateMerchandisesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('merchandises', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('name');
            $table->integer('status')->default(0);
            $table->string('introduction');
            $table->integer('stock_count')->default(0);
            $table->string('price');
            $table->text('picture')->nullable();
            $table->string('pic_type')->nullable();
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
		Schema::drop('merchandises');
	}
}
