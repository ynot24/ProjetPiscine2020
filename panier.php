<?php
    session_start();

    if($_SESSION['connected'])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <title>Mon Panier</title>
            </head>
        
            <body>
        
            <?php include("header.php"); ?>
            
            <?php include("menu.php"); ?>
            
            <!-- Le corps -->
            
            <div id="corps">
                <h1>Mon Panier</h1>
                <div>
                    <h2>Mes achats</h2>
                    <?php 
                    // Identifier le nom de base de données
                    $database = "ebayce";

                    // Connecter à la base de données
                    $db_handle = mysqli_connect('localhost', 'root', '');
                    $db_found = mysqli_select_db($db_handle, $database);

                    // Si la BDD existe, faire le traitement
                    if ($db_found) 
                    {
                        $sql = "SELECT * FROM acheteurs";
                        if($_SESSION['mail'] != "") 
                        {
                            //on cherche la personne avec le paramètre $_SESSION['mail']
                            $sql .= " WHERE Mail LIKE '$_SESSION['mail']'";
                        }
                        $result = mysqli_query($db_handle, $sql);
                        
                        //regarder s'il y a de résultat
                        if (mysqli_num_rows($result) != 0) 
                        {
                            while ($data = mysqli_fetch_assoc($result)) 
                            {
                                $id_acheteur = $data['ID_Acheteur'];
                            }

                            //afficher tous les items de l'acheteur
                            $sql = "SELECT * FROM items";
                            if($id_acheteur != "") 
                            {
                                //on cherche les items avec le id_acheteur
                                $sql .= " WHERE ID_Acheteur LIKE '$id_acheteur'";
                            }
                            $result = mysqli_query($db_handle, $sql);
                            
                            //regarder s'il y a de résultat
                            if (mysqli_num_rows($result) != 0) 
                            {
                                while ($data = mysqli_fetch_assoc($result)) 
                                {
                                    if ($data['Statut_vente']=='non vendu')
                                    {
                                        echo "Photo: " . $data['Photo'] . '<br>';
                                        echo "Intitulé: " . $data['Intitule'] . '<br>';
                                        echo "Prix:" . $data['Prix'] .'<br>';
                                    }
                                    else
                                    {
                                        echo "Panier Vide";
                                    }
                                }
                                ?>
                                <form action="validation_panier.php">
                                    <input type="submit" value="Valider mon panier">
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "Panier Vide";
                            }

                        } 
                        else 
                        {
                            echo "Vous êtes un vendeur. Par conséquent, vous n'avez pas accès au panier.";
                            ?><a href="PageAccueil.html">Revenir à la page d'accueil</a><?php
                        }
                    }
                    else
                    {
                        echo "Erreur : accès à la base de donnée échouée !";
                    }
                    
                    //fermer la connexion
                    mysqli_close($db_handle);
                    ?>
                </div>
            </div>
            
            <!-- Le pied de page -->
            
            <?php include("footer.php"); ?>
            
            </body>
        </html><?php
    }
    else
    {
        ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Mon Panier</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Mon Panier</h1>
                    <p>Désolé.</p> 
                    <p>Tant que vous n'êtes pas connecté à votre compte.</p> 
                    <p>Vous n'avez pas accès au panier.</p>
                    <a href="compteV2.html">Se rediriger vers la page de connexion</a>
                </div>
                
                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html>
        <?php
    }
?>