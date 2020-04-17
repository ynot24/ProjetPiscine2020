<?php
    
    //Déclaration des variables
    $id_item = isset($_POST["ID_Item"])? $_POST["ID_Item"] : "";

    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        $sql= "SELECT * FROM items WHERE ID_Item LIKE '$id_item'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) == 0) 
        {
            //Vendeur inexistant
            /*
            
            CODE HTML QUI AFFICHE UNE PAGE AVEC UN MESSAGE QUI DIT QUE L'ITEM N'EXISTE PAS

            */
        } 
        else 
        {
            $sql = "DELETE FROM items WHERE ID_Item = $id_item";
            $result = mysqli_query($db_handle, $sql);
            
            /*
            
            CODE HTML QUI AFFICHE UNE PAGE AVEC UN MESSAGE QUI DIT QUE L'ITEM A ETE SUPPRIME

            */
        }
    } 
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);
?>