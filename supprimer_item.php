<?php
    session_start();

    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        $sql= "SELECT * FROM administrateurs WHERE Mail LIKE '$_SESSION['mail']'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) 
        {   
            ?>
            <!-- a modifier -->
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Supprimer un item</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Mon Compte Admin</h1>
                    <div>
                        <h2>Supprimer un item</h2>
                        <p>Veuillez saisir l'ID de l'item</p>
                        <form action="processus_suppression_item.php" method="POST">
                        <label>ID :<input type="number" name="ID_Item" maxlength="3" required /></label>
                        </form>
                    </div>
                </div>

                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html><?php
        }
        else
        {
                header ("Refresh: 3;URL=PageAccueil.html");
        }
    }
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);
?>