<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('nom', 50);
            $table->string('description', 50);
            $table->string('email', 50);
            $table->string('telephone', 50);
            $table->decimal('evaluation', 15, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('offre', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 50);
            $table->string('description', 50);
            $table->decimal('salaire', 15, 2);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->foreignId('entreprise_id')->constrained('entreprise')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50)->unique();
            $table->string('mdp');
            $table->string('role', 50);
            $table->timestamps();
        });

        Schema::create('etudiant', function (Blueprint $table) {
            $table->id();
            $table->string('etat_recherche', 50);
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->foreignId('utilisateur_id')->unique()->constrained('utilisateur')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('competence', function (Blueprint $table) {
            $table->id();
            $table->string('competence', 50);
            $table->timestamps();
        });

        Schema::create('candidature', function (Blueprint $table) {
            $table->id();
            $table->date('date_candid');
            $table->text('lettre_motiv');
            $table->string('cv', 50);
            $table->foreignId('offre_id')->constrained('offre')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('postuler', function (Blueprint $table) {
            $table->foreignId('offre_id')->constrained('offre')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->primary(['offre_id', 'utilisateur_id']);
        });

        Schema::create('wishlist', function (Blueprint $table) {
            $table->foreignId('offre_id')->constrained('offre')->onDelete('cascade');
            $table->foreignId('utilisateur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->primary(['offre_id', 'utilisateur_id']);
        });

        Schema::create('requiert', function (Blueprint $table) {
            $table->foreignId('offre_id')->constrained('offre')->onDelete('cascade');
            $table->foreignId('competence_id')->constrained('competence')->onDelete('cascade');
            $table->primary(['offre_id', 'competence_id']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('requiert');
        Schema::dropIfExists('wishlist');
        Schema::dropIfExists('postuler');
        Schema::dropIfExists('candidature');
        Schema::dropIfExists('competence');
        Schema::dropIfExists('etudiant');
        Schema::dropIfExists('utilisateur');
        Schema::dropIfExists('offre');
        Schema::dropIfExists('entreprise');
    }
};