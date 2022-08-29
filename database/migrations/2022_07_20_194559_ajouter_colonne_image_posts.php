<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Avec cette commande je vais ajouter une colonne dans la table post
        // Une colonne avec comme nom "image" et comme type "string" et comme valeur "nullable"

        // Schema::table('posts', function (Blueprint $table) {
        //     $table->string('image')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
