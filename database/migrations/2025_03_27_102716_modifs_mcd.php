<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('requiert');
        Schema::dropIfExists('wishlist');
        Schema::dropIfExists('postuler');
        Schema::dropIfExists('candidature');
        Schema::dropIfExists('competence');
        Schema::dropIfExists('etudiant');
        Schema::dropIfExists('utilisateur');
        Schema::dropIfExists('offre');
        Schema::dropIfExists('entreprise');
        Schema::dropIfExists('evaluer');
        Schema::dropIfExists('requiert');
        Schema::dropIfExists('wishlist');
        Schema::dropIfExists('candidatures');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('utilisateurs');
        Schema::dropIfExists('statuts');
        Schema::dropIfExists('competences');
        Schema::dropIfExists('offres');
        Schema::dropIfExists('entreprises');
    

        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->text('description');
            $table->string('email', 50);
            $table->string('telephone', 50);
            $table->decimal('evaluation', 15, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 50);
            $table->text('description');
            $table->decimal('salaire', 15, 2);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->foreignId('entreprise_id')->constrained('entreprises')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('competence', 50);
            $table->timestamps();
        });

        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->string('nom_statut', 50);
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom_role', 50);
            $table->timestamps();
        });

        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50)->unique();
            $table->string('mdp', 255);
            $table->foreignId('statut_id')->nullable()->constrained('statuts')->onDelete('set null');
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->date('date_candid');
            $table->text('lettre_motiv');
            $table->string('cv', 50);
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('offre_id')->constrained('offres')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('wishlist', function (Blueprint $table) {
            $table->foreignId('offre_id')->constrained('offres')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->primary(['offre_id', 'utilisateur_id']);
        });

        Schema::create('requiert', function (Blueprint $table) {
            $table->foreignId('offre_id')->constrained('offres')->onDelete('cascade');
            $table->foreignId('competence_id')->constrained('competences')->onDelete('cascade');
            $table->primary(['offre_id', 'competence_id']);
        });

        Schema::create('evaluer', function (Blueprint $table) {
            $table->foreignId('entreprise_id')->constrained('entreprises')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->double('note');
            $table->primary(['entreprise_id', 'utilisateur_id']);
        });

    }

    public function down()
    {
        Schema::dropIfExists('evaluer');
        Schema::dropIfExists('requiert');
        Schema::dropIfExists('wishlist');
        Schema::dropIfExists('candidatures');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('utilisateurs');
        Schema::dropIfExists('statuts');
        Schema::dropIfExists('competences');
        Schema::dropIfExists('offres');
        Schema::dropIfExists('entreprises');
    }
};