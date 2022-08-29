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
        // Avec cette commande je vais ajouter une colonne dans la table users
        // Une colonne avec comme nom "image" et comme type "string" et comme valeur "nullable"

        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('avatar')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Avec cette commande je vais supprimer la colonne "avatar" de la table users

        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColum('avatar')->nullable();
        // });
    }
};
