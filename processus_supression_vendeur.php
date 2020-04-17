<?php
    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        $sql= "SELECT * FROM vendeurs WHERE ID_Vendeur LIKE '$id_vendeur'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) == 0) 
        {
            //Vendeur inexistant
            echo "Cannot delete. Book not found. <br>";
        } 
        else 
        {
            while ($data = mysqli_fetch_assoc($result) ) 
            {
                $id = $data['ID'];
                echo "<br>";
            }
            $sql = "DELETE FROM books";
            $sql .= " WHERE ID = $id";
            $result = mysqli_query($db_handle, $sql);
            echo "Delete successful. <br>";
            
            //on affiche les autres livres dans la BDD
            $sql = "SELECT * FROM books";
            $result = mysqli_query($db_handle, $sql);
            echo "Les livres dans notre bibliothèque: <br>";
            while ($data = mysqli_fetch_assoc($result)) 
            {
                echo "ID: " . $data['ID'] . "<br>";
                echo "Titre: " . $data['Titre'] . "<br>";
                echo "Auteur: " . $data['Auteur'] . "<br>";
                echo "Année: " . $data['Annee'] . "<br>";
                echo "Editeur: " . $data['Editeur'] . "<br>";
                echo "<br>";
            }
        }
    } 
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);
?>