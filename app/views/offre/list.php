<?php
$offres = [
    ["titre" => "Stage Développeur Web", "entreprise" => "Tech Solutions", "ville" => "Paris"],
    ["titre" => "Stage Data Analyst", "entreprise" => "DataCorp", "ville" => "Lyon"],
    ["titre" => "Stage Ingénieur Réseau", "entreprise" => "NetSecure", "ville" => "Marseille"],
    ["titre" => "Stage Marketing Digital", "entreprise" => "WebCom", "ville" => "Toulouse"],
    ["titre" => "Stage Graphiste UI/UX", "entreprise" => "CreativeDesign", "ville" => "Bordeaux"],
    ["titre" => "Stage Consultant Cybersécurité", "entreprise" => "CyberDef", "ville" => "Lille"],
    ["titre" => "Stage Développeur Mobile", "entreprise" => "App Innov", "ville" => "Nantes"],
    ["titre" => "Stage Chef de Projet IT", "entreprise" => "IT Consulting", "ville" => "Strasbourg"],
    ["titre" => "Stage Community Manager", "entreprise" => "SocialBoost", "ville" => "Nice"],
    ["titre" => "Stage Administrateur Systèmes", "entreprise" => "CloudTech", "ville" => "Rennes"],
    ["titre" => "Stage Développeur Full Stack", "entreprise" => "Code Factory", "ville" => "Paris"],
    ["titre" => "Stage Ingénieur DevOps", "entreprise" => "DevOps Solutions", "ville" => "Lyon"],
    ["titre" => "Stage Analyste Sécurité", "entreprise" => "CyberShield", "ville" => "Marseille"],
    ["titre" => "Stage Rédacteur Web", "entreprise" => "ContentKing", "ville" => "Toulouse"],
    ["titre" => "Stage Ingénieur IA", "entreprise" => "AI Lab", "ville" => "Bordeaux"],
    ["titre" => "Stage Administrateur Réseaux", "entreprise" => "SecureNet", "ville" => "Lille"],
    ["titre" => "Stage Chargé de Communication", "entreprise" => "MediaPro", "ville" => "Nantes"],
    ["titre" => "Stage Webdesigner", "entreprise" => "Creative Pixels", "ville" => "Strasbourg"],
    ["titre" => "Stage Développeur Backend", "entreprise" => "Backend Factory", "ville" => "Nice"],
    ["titre" => "Stage Consultant SEO", "entreprise" => "SEO Masters", "ville" => "Rennes"],
    ["titre" => "Stage Data Scientist", "entreprise" => "Big Data Analytics", "ville" => "Paris"],
    ["titre" => "Stage Ingénieur Logiciel", "entreprise" => "SoftTech", "ville" => "Lyon"],
    ["titre" => "Stage Chef de Produit Digital", "entreprise" => "Digital Mark", "ville" => "Marseille"],
    ["titre" => "Stage Analyste Financier", "entreprise" => "FinTech Consulting", "ville" => "Toulouse"],
    ["titre" => "Stage Développeur Python", "entreprise" => "Code Python", "ville" => "Bordeaux"],
    ["titre" => "Stage Administrateur Cloud", "entreprise" => "Cloud Masters", "ville" => "Lille"],
    ["titre" => "Stage Growth Hacker", "entreprise" => "Growth Agency", "ville" => "Nantes"],
    ["titre" => "Stage Ingénieur Robotique", "entreprise" => "Robotics Lab", "ville" => "Strasbourg"],
    ["titre" => "Stage Rédacteur SEO", "entreprise" => "SEO Writers", "ville" => "Nice"],
    ["titre" => "Stage Développeur Frontend", "entreprise" => "Web Dev", "ville" => "Rennes"],
    ["titre" => "Stage Administrateur Bases de Données", "entreprise" => "DB Solutions", "ville" => "Paris"],
    ["titre" => "Stage Business Developer", "entreprise" => "Biz Dev", "ville" => "Lyon"],
    ["titre" => "Stage Expert Référencement", "entreprise" => "SEO Experts", "ville" => "Marseille"],
    ["titre" => "Stage Consultant Cloud", "entreprise" => "Cloud Consulting", "ville" => "Toulouse"],
    ["titre" => "Stage Web Analyst", "entreprise" => "Web Metrics", "ville" => "Bordeaux"],
    ["titre" => "Stage UX Designer", "entreprise" => "UX Agency", "ville" => "Lille"],
    ["titre" => "Stage Consultant IT", "entreprise" => "IT Experts", "ville" => "Nantes"],
    ["titre" => "Stage Spécialiste IA", "entreprise" => "AI Research", "ville" => "Strasbourg"],
    ["titre" => "Stage Gestionnaire de Projet", "entreprise" => "ProjectPro", "ville" => "Nice"],
    ["titre" => "Stage Data Engineer", "entreprise" => "Big Data Solutions", "ville" => "Rennes"],
    ["titre" => "Stage Développeur C++", "entreprise" => "Code C++", "ville" => "Paris"],
    ["titre" => "Stage Rédacteur Technique", "entreprise" => "Tech Writers", "ville" => "Lyon"],
    ["titre" => "Stage Chargé de Marketing", "entreprise" => "MarketPro", "ville" => "Marseille"],
    ["titre" => "Stage Administrateur Linux", "entreprise" => "Linux Systems", "ville" => "Toulouse"],
    ["titre" => "Stage Développeur JavaScript", "entreprise" => "JS Masters", "ville" => "Bordeaux"],
    ["titre" => "Stage Consultant Digital", "entreprise" => "Digital Consulting", "ville" => "Lille"],
    ["titre" => "Stage Analyste Web", "entreprise" => "WebAnalytics", "ville" => "Nantes"]
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
$paginatedOffre = array_slice($offres, $start, $perPage); // Découpe du tableau

// Affichage des entreprises pour la page actuelle
foreach ($paginatedOffre as $offre) {
    echo '<div class="offre">';
    echo '<div>';
    echo '<h3>' . htmlspecialchars($offre['titre']) . '</h3>';
    echo '<p><strong>' . htmlspecialchars($offre['entreprise']) . '</strong></p>';
    echo '<p>' . htmlspecialchars($offre['ville']) . '</p>';
    echo '</div>';
    echo '<a href="detailOffre.php"> Consulter </a>';
    echo '</div>';
}

?>