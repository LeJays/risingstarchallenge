<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rising Star Challenge /Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="#"><img src="img/rsc-noir.ico" alt="nav_logo"></a>
        </div>
        <ul class="nav_links">
            <li class="link"><a href="index.html">Acceuil</a></li>
            <li class="link"><a href="inscription.html">Inscription</a></li>
            <li class="link"><a href="service.html">Services</a></li>
            <li class="link"><a href="about.html">A Propos</a></li>
        </ul>
        <a href="about.html"><button class="btn">A Propos</button></a>
    </nav>
    <div class="xd">
        <div class="box">
            <span class="borderLine"></span>
            <form action="" method="post">
                <h1> Inscription </h1>
                <div class="inputBox">
                    <input type="text" required="required" name="nom">
                    <span>Noms</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="tel">
                    <span>Téléphone</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="sex">
                    <span>Sexe</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="email" required="required" name="email">
                    <span>Mail</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" required="required" name="rubrique">
                    <span>Rubrique</span>
                    <i></i>
                </div>
                
                <div class="links">
                    <a href="#">Entrez dans l'univers des étoiles</a>
                    
                </div>
                <a href="index.html"><input type="submit" value="S'incrire"></a>
            </form>
        </div>
    </div>
    
    <section class="section_container join_container">
        <h2 class="section_header">POURQUOI VOUS INSCRIRE?</h2>
        <p class="section_subheader">
            <div class="join_image">
                <img src="img/pp.jpg" alt="join">
                <div class="join_grid">
                    <div class="join_card">
                        <div class="join_card_content">
                            <h4>De Bon Contrats</h4>
                            <p>Avec RSC vous avez la possibilité de gagner des contrats divers pour 
                                de grandes entreprises.
                            </p>
                        </div>
                    </div>
                    <div class="join_card">
                        <div class="join_card_content">
                            <h4>Certificats</h4>
                            <p>En gagnant votre Rubrique vous avez aussi un certidicat de proffessionaliste dans votre domaine.
                            </p>
                        </div>
                    </div>
                    <div class="join_card">
                        <div class="join_card_content">
                            <h4>Grande Visibilité</h4>
                            <p>En sortant vainqueur d'une rubrique vous avec la possibilité de passer dans 
                                des chaines de télévision pour parler de votre savoir faire et gagner en Visibilité.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </p>
    </section>
    <footer class="section_container footer_container">
        <span class="bg_blur"></span>
        <span class="bg_blur footer_blur"></span>
        <div class="footer_col">
            <div class="footer_logo"><img src="img/rsc-noir.ico" alt="logo"></div>
            <p>
                Take the first step towards a healthier, stronger you with our
                unbeatable pricing plans. Let's sweat, achieve, and conquer together!
            </p>
            <div class="footer_socials">
                <a href="https://www.facebook.com/RSCOfficiel20"><img src="img/facebook.png" alt="facebook"></a>
                <a href="#"><img src="img/instagram.png" alt="instagram"></a>
                <a href="https://twitter.com/OfficielRising "><img src="img/twitter.png" alt="twitter"></a>
            </div>
        </div>
        <div class="footer_col">
            <h4>Company</h4>
            <a href="#">Business</a>
            <a href="#">Franchise</a>
            <a href="#">Partnership</a>
            <a href="#">Network</a>
        </div>
        <div class="footer_col">
            <h4>About Us</h4>
            <a href="https://www.facebook.com/RSCOfficiel20">Blogs</a>
            <a href="#">Security</a>
            <a href="#">Careers</a>
        </div>
        <div class="footer_col">
            <h4>Contact</h4>
            <a href="#">Contact Us</a>
            <a href="#">privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">BMI Calculator</a>
        </div>
    </footer>
    <div class="footer_bar">
        copyright @ 2024 Rising Star Challenge. La réussite au bout du rêve.
    </div>
</body>
</html>
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