#!/bin/bash
set -e

# Attendre que la base de données soit prête (optionnel mais recommandé en cloud)
echo "En attente de la base de données..."
sleep 5

# Créer la base de données (si elle n'existe pas)
echo "Initialisation de la base de données..."
php bin/console doctrine:database:create --if-not-exists

# Générer et appliquer le schéma de la base de données
echo "Génération et application du schéma PostgreSQL depuis les Entités..."
php bin/console doctrine:schema:update --force --complete --no-interaction

# Insérer les données initiales depuis le fichier SQL
echo "Injection des données initiales..."
# On utilise PDO via un script PHP rapide pour se connecter avec l'URL de DATABASE_URL
php -r '
$dbUrl = parse_url(getenv("DATABASE_URL"));
$host = $dbUrl["host"];
$port = isset($dbUrl["port"]) ? $dbUrl["port"] : 5432;
$user = $dbUrl["user"];
$pass = isset($dbUrl["pass"]) ? $dbUrl["pass"] : "";
$dbName = ltrim($dbUrl["path"], "/");
$dsn = "pgsql:host=$host;port=$port;dbname=$dbName";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = file_get_contents("sql/init_data.sql");
    $pdo->exec($sql);
    echo "Données insérées avec succès.\n";
} catch (Exception $e) {
    echo "Erreur d" . "insertion des données : " . $e->getMessage() . "\n";
}
'

# Lancer Apache en premier plan
echo "Démarrage d'Apache..."
apache2-foreground