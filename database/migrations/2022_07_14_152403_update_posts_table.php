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
            
            //creazion colonna FK key
            $table -> unsignedBigInteger('category_id')->nullable()->after('id');
 
            $table -> foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null')
                //->onDelete('cascade') con cascade vengono eliminati tutti i post con quella category
            ;
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

            //eliminazione della FK
            $table ->dropForeign('[category_id]');
            //eliminazione colonna
            $table ->dropColumn('category_id');
        });
    }
}
