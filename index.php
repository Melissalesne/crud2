<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <?php

    // Constantes d'environement 
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "crud2");

    // DSN de connexion 
    $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    // On va se connecter à la base 

    try{
        // On instancie PDO 
        $db = new PDO($dsn, DBUSER, DBPASS);

        // On s'assure d'envoyer les données en utf8 
        $db->exec("SET NAMES utf8");

        // On définit le mode de "fetch" par défaut 
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        

    }catch(PDOException $e){
        die($e->getMessage());
    }

     //  On est connectés à la base de données
     // On peut récupérer la liste des utilisateurs (users)
     $sql = "SELECT * FROM `users`";

     // On exécute directement la requête 
     $statment = $db->query($sql);

     // On récupère les données (fetch ou fetchAll)
     $user = $statment->fetch();

    // Ajouter un utilisateur 
    $sql = "INSERT INTO `users`(`email`, `password`,`roles`) VALUES ('test@test-demo.fr', 'azerty','[\"ROLE_USER\"]')";
    $statment = $db->query($sql);

    // Modifier un utilisateur 
    $sql = "UPDATE `users` SET `password` = 'qsdfgh' WHERE `id` = 3";
    $statment = $db->query($sql);

    // Supprimer des utilisateurs 
    $sql = "DELETE FROM `users` WHERE `id` > 3";
    $statment = $db->query($sql);
    ?>















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    
</body>
</html>