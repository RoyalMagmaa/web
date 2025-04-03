<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wishlist', function (Blueprint $table) {
            $table->unique(['utilisateur_id', 'offre_id'], 'wishlist_unique'); // Ajout de la contrainte unique
        });
    }

    public function down()
    {
        Schema::table('wishlist', function (Blueprint $table) {
            $table->dropUnique('wishlist_unique'); // Suppression de la contrainte unique si rollback
        });
    }
};
