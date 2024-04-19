<?php

//connexion à votre base de données
$host = "localhost";
$dbname = "rsc";
$username = "root";
$password = "";

// Se connecter à la base de données
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

// Récupérer les données du formulaire
$nom = $_POST["nom"];
$tel = $_POST["tel"];
$sex = $_POST["sex"];
$email = $_POST["email"];
$rubrique = $_POST["rubrique"];


// Hacher le mot de passe pour plus de sécurité
//$mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

// Préparer la requête SQL pour insérer les données
$sql = "INSERT INTO candidats (nom, tel,sexe, mail, rubrique) VALUES (:nom, :tel,:sex, :email, :rubrique)";
$stmt = $db->prepare($sql);

// Lier les paramètres aux valeurs
$stmt->bindParam(":nom", $nom);
$stmt->bindParam(":tel", $tel);
$stmt->bindParam(":sex", $sex);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":rubrique", $rubrique);



// Exécuter la requête
if ($stmt->execute()) {
    echo "<p>Inscription réussie !</p>";
} else {
    echo "<p>Erreur d'inscription : " . $stmt->errorInfo()[2] . "</p>";
}
?>