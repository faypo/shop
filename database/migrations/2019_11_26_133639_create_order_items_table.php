<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrderItemsTable.
 */
class CreateOrderItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('merchandise_id')->unsigned();
            $table->string('buy_count');
            $table->string('total_price');
            $table->timestamps();
            $table->foreign('merchandise_id')
                    ->references("id")->on('merchandises')
                    ->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete("cascade")->onUpdate("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}
}
