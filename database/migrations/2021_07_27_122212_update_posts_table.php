<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')
            ->nullable()
            ->after('id');
            $table->foreign('category_id')
            ->references('id') //a quale colonna (in questo caso "id") nella tabella "Categories" si fa riferimento
            ->on('categories') //a quale tabella si fa riferimento (in questo caso "Categories)
            ->onDelete('SET NULL'); //se cancello la categoria, non mi cancella in automatico i posts associati a auesta categoria

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign'); //cancello il vincolo di relazione
            $table->dropColumn('category_id');
        });
    }
}
