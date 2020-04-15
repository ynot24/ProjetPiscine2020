<?php

    // Décalaration des variables qui sont affectés aux valeurs saisies dans le formulaire par l'utilisateur 
    $nom = $POST_['Nom'];
    $prenom = $POST_['Prenom'];
    $d_n = $POST_['DateNaissance'];
    $adresse = $POST_['Adresse'];
    $paiement = $POST['Paiement'];
    $mail = $POST_['Mail'];
    $m_p = $POST_['MotDePasse'];
    
    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        // Insertion d'un nouveau vendeur
        $sql = "INSERT INTO 'acheteurs'('Nom', 'Prenom', 'DateNaissance', 'Adresse', 'Paiement', 'Mail', 'MotDePasse') VALUES ('$nom', '$prenom', '$d_n', '$adresse', '$paiement','$mail', '$m_p')";
        $result = mysqli_query($db_handle, $sql);

        // Voir la liste des vendeurs
        $sql = "SELECT * FROM acheteurs";
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) 
        {
            echo "ID_Acheteur: " . $data['ID_Vendeur'] . '<br>';
            echo "Nom:" . $data['Nom'] .'<br>';
            echo "Prénom: " . $data['Prenom'] . '<br>';
            echo "Date de Naissance: " . $data['DateNaissance'] . '<br>';
            echo "Adresse: " . $data['Adresse'] . '<br>';
            echo "Type de Paiement: " . $data['Paiement'] . '<br>';
            echo "Mail: " . $data['Mail'] . '<br>';
            echo "Mot de Passe: " . $data['MotDePasse'] . '<br>';
        }

    }
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
?>