<?php
    session_start();

    if($_SESSION['connected'])
    {
        // Identifier le nom de base de données
        $database = "ebayce";

        // Connecter à la base de données
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        // Si la BDD existe, faire le traitement
        if ($db_found) 
        {
            $sql = "SELECT * FROM acheteurs WHERE Mail LIKE '$_SESSION['mail']'";
            $result = mysqli_query($db_handle, $sql);
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $id_acheteur = $data['ID_Acheteur'];
            }

            //mettre à jour les statuts des ventes
            $sql = "SELECT * FROM achats_immediats INNER JOIN items ON items.ID_Acheteur LIKE '$id_acheteur' AND achats_immediats.ID_Item LIKE ID_Item";
            $result = mysqli_query($db_handle, $sql);
            $ids = array();
            while ($data = mysqli_fetch_assoc($result)) 
            {
                $ids[] = $data['ID_AchatImmediat'];
            }
            for($i=0; $i<count($ids); $i++)
            {
                $sql = "UPDATE achats_immediats SET Statut_vente = 'vendu' WHERE ID_AchatImmediat LIKE '$ids[$i]'";
                $result = mysqli_query($db_handle, $sql);
            }
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Validation Achat</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Achats</h1>
                    <div>
                        <h2>Merci pour votre achat.</h2>
                        <p>Votre achat a été prise en compte.</p>
                        <a href="mon_compte.php">Aller dans Mon Compte pour plus d'informations.</a>
                    </div>   
                </div>
                
                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html>
            <?php
        }
        else
        {
            echo "Erreur : accès à la base de donnée échouée !";
        }
        
        //fermer la connexion
        mysqli_close($db_handle);
    }
    else
    {
        header ("Refresh: 3;URL=PageAccueil.html");
    }
?>