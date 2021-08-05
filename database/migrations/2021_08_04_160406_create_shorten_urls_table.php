<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateShortenUrlsTable.
 */
class CreateShortenUrlsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shorten_urls', function(Blueprint $table) {
            $table->increments('id');
			$table->string('url', 1000);
			$table->string('code');
			$table->unsignedBigInteger('hit')->default(0);

			$table->dateTime('expired_at')->nullable();
            $table->timestamps();
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
		Schema::drop('shorten_urls');
	}
}
