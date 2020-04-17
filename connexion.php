<?php
    
    //Déclaration des variables
    $mail = isset($_POST["Mail"])? $_POST["Mail"] : "";
    $m_p = isset($_POST["MotDePasse"])? $_POST["MotDePasse"] : "";
    $choix_user = isset($_POST["choix"])? $_POST["choix"] : "";

    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        $sql = "SELECT * FROM $choix_user";
        if($mail != "") 
        {
            //on cherche la personne avec les paramètres mail et mot de passe
            $sql .= " WHERE Mail LIKE '$mail'";
            if ($m_p != "") 
            {
                $sql .= " AND MotDePasse LIKE '$m_p'";
            }
        }
        $result = mysqli_query($db_handle, $sql);

        //regarder s'il y a de résultat
        if (mysqli_num_rows($result) != 0) 
        {
            //création d'une session utilisateur
            session_start();

            //variables de session dans $_SESSION
            $_SESSION['mail'] = $mail;
            $_SESSION['connected'] = true;

            //la personnne est déjà dans la BDD
            echo "Connexion réussie<br>";
            ?><a href="mon_compte.php">Accéder à votre compte</a><?php
        } 
        else 
        {
            echo "Connexion échouée, veuillez réessayer !<br>";
            ?><a href="compteV2.html">Accéder à la page de connexion</a><?php
        }
    }
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);

?>