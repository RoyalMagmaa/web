<?php
$entreprises = [
    ["nom" => "Apple", "secteur" => "Technologie", "ville" => "Cupertino"],
    ["nom" => "Google", "secteur" => "Technologie", "ville" => "Mountain View"],
    ["nom" => "Microsoft", "secteur" => "Technologie", "ville" => "Redmond"],
    ["nom" => "Tesla", "secteur" => "Automobile", "ville" => "Palo Alto"],
    ["nom" => "Amazon", "secteur" => "Commerce électronique", "ville" => "Seattle"],
    ["nom" => "Facebook", "secteur" => "Réseaux sociaux", "ville" => "Menlo Park"],
    ["nom" => "Airbus", "secteur" => "Aéronautique", "ville" => "Toulouse"],
    ["nom" => "Orange", "secteur" => "Télécommunications", "ville" => "Paris"],
    ["nom" => "Société Générale", "secteur" => "Banque", "ville" => "Paris"],
    ["nom" => "L'Oréal", "secteur" => "Cosmétique", "ville" => "Clichy"],
    ["nom" => "Danone", "secteur" => "Agroalimentaire", "ville" => "Paris"],
    ["nom" => "Volkswagen", "secteur" => "Automobile", "ville" => "Wolfsburg"],
    ["nom" => "BMW", "secteur" => "Automobile", "ville" => "Munich"],
    ["nom" => "Siemens", "secteur" => "Technologie", "ville" => "Munich"],
    ["nom" => "Nokia", "secteur" => "Télécommunications", "ville" => "Espoo"],
    ["nom" => "Sony", "secteur" => "Électronique", "ville" => "Tokyo"],
    ["nom" => "Samsung", "secteur" => "Électronique", "ville" => "Séoul"],
    ["nom" => "Ubisoft", "secteur" => "Jeux vidéo", "ville" => "Montreuil"],
    ["nom" => "Capgemini", "secteur" => "Consulting", "ville" => "Paris"],
    ["nom" => "Accenture", "secteur" => "Consulting", "ville" => "Dublin"],
    ["nom" => "Hewlett-Packard", "secteur" => "Technologie", "ville" => "Palo Alto"],
    ["nom" => "Twitter", "secteur" => "Réseaux sociaux", "ville" => "San Francisco"],
    ["nom" => "Spotify", "secteur" => "Média", "ville" => "Stockholm"],
    ["nom" => "Netflix", "secteur" => "Média", "ville" => "Los Gatos"],
    ["nom" => "Pinterest", "secteur" => "Réseaux sociaux", "ville" => "San Francisco"],
    ["nom" => "Slack", "secteur" => "Technologie", "ville" => "San Francisco"],
    ["nom" => "Intel", "secteur" => "Technologie", "ville" => "Santa Clara"],
    ["nom" => "AMD", "secteur" => "Technologie", "ville" => "Santa Clara"],
    ["nom" => "Spotify", "secteur" => "Média", "ville" => "Stockholm"],
    ["nom" => "LVMH", "secteur" => "Luxe", "ville" => "Paris"],
    ["nom" => "Kering", "secteur" => "Luxe", "ville" => "Paris"],
    ["nom" => "Louis Vuitton", "secteur" => "Luxe", "ville" => "Paris"],
    ["nom" => "TotalEnergies", "secteur" => "Énergie", "ville" => "Paris"],
    ["nom" => "EDF", "secteur" => "Énergie", "ville" => "Paris"],
    ["nom" => "Schneider Electric", "secteur" => "Énergie", "ville" => "Rueil-Malmaison"],
    ["nom" => "Accor", "secteur" => "Hôtellerie", "ville" => "Paris"],
    ["nom" => "Air France", "secteur" => "Aérien", "ville" => "Roissy-en-France"],
    ["nom" => "Leclerc", "secteur" => "Distribution", "ville" => "Landerneau"],
    ["nom" => "Carrefour", "secteur" => "Distribution", "ville" => "Massy"],
    ["nom" => "Decathlon", "secteur" => "Distribution", "ville" => "Villeneuve-d\"Ascq"],
    ["nom" => "Météo France", "secteur" => "Services", "ville" => "Paris"],
    ["nom" => "Orange", "secteur" => "Télécommunications", "ville" => "Paris"],
    ["nom" => "Bouygues", "secteur" => "Construction", "ville" => "Paris"],
    ["nom" => "La Poste", "secteur" => "Services", "ville" => "Paris"],
    ["nom" => "SNCF", "secteur" => "Transport", "ville" => "Paris"],
    ["nom" => "Vinci", "secteur" => "Construction", "ville" => "Rueil-Malmaison"],
    ["nom" => "Groupe Renault", "secteur" => "Automobile", "ville" => "Boulogne-Billancourt"],
    ["nom" => "Stellantis", "secteur" => "Automobile", "ville" => "Poissy"],
    ["nom" => "Dassault Systèmes", "secteur" => "Technologie", "ville" => "Vélizy-Villacoublay"],
    ["nom" => "Atos", "secteur" => "Technologie", "ville" => "Bezons"],
    ["nom" => "Alstom", "secteur" => "Transport", "ville" => "Saint-Ouen"]
];

// Nombre d'éléments par page
$perPage = 10;

// Récupérer la page actuelle à partir de la variable GET 'page'
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Par défaut, page 1

// Sécuriser la page en la validant
if ($page < 1) {
    $page = 1; // Si la page est invalide, on affiche la page 1
}

// Découper le tableau avec array_slice
$start = ($page - 1) * $perPage; // Calcul de l'index de départ
$paginatedEntreprises = array_slice($entreprises, $start, $perPage); // Découpe du tableau

// Affichage des entreprises pour la page actuelle
foreach ($paginatedEntreprises as $entreprise) {
    echo "<p>Nom : " . htmlspecialchars($entreprise['nom']) . "<br> Secteur : " . htmlspecialchars($entreprise['secteur']) . "<br> Ville : " . htmlspecialchars($entreprise['ville']) . "</p>";
}

?>