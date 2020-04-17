<?php
    session_start();

    if ($_SESSION['mail'])
    {
        // Identifier le nom de base de données
        $database = "ebayce";

        // Connecter à la base de données
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        // Si la BDD existe, faire le traitement
        if ($db_found) 
        {
            $sql1 = "SELECT * FROM vendeurs WHERE Mail LIKE '$_SESSION['mail']'";
            $sql2 = "SELECT * FROM administrateurs WHERE Mail LIKE '$_SESSION['mail']'";
            $result1 = mysqli_query($db_handle, $sql1);
            $result2 = mysqli_query($db_handle, $sql2);
            if ((mysqli_num_rows($result1) != 0)||(mysqli_num_rows($result2) != 0)) 
            {
                ?>
                <!-- a modif-->
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8" />
                        <title>Formulaire de vente</title>
                    </head>
                
                    <body>
                
                    <?php include("header.php"); ?>
                    
                    <?php include("menu.php"); ?>
                    
                    <!-- Le corps -->
                    
                    <div id="corps">
                        <h1>Formulaire de vente</h1>
                        <p>Veuillez renseigner les champs ci-dessous :</p><br>
                        <form action="ajout_item.php" method="POST">
                            <p><label>Intitulé :<input type="text" name="Intitule" /></label></p>
                            <p><label>Prix :<input type="number" name="Prix" /> €</label></p>
                            <p><label>Catégorie :<input type="text" name="Categorie" /></label></p>
                            <p><label>Description :<input type="text area" rows="6" name="Description" /></label></p>
                            <p><label>Nature de la première vente :
                                <div><input type="radio" name="NatureVente1" value="Encheres" /><label>Encheres</label></div>
                                <div><input type="radio" name="NatureVente1" value="MeilleuresOffres" /><label>Meilleures Offres</label></div>
                                <div><input type="radio" name="NatureVente1" value="AchatImmediat" /><label>Achat Immediat</label></div>
                                </label></p>
                            <p><label>Nature de la deuxième vente (optionnelle):
                                <div><input type="radio" name="NatureVente2" value="Encheres" /><label>Encheres</label></div>
                                <div><input type="radio" name="NatureVente2" value="MeilleuresOffres" /><label>Meilleures Offres</label></div>
                                <div><input type="radio" name="NatureVente2" value="AchatImmediat" /><label>Achat Immediat</label></div>
                                </label></p>
                            <p>Si vous avez choisi une enchère, veuillez renseigner les champs suivants : <p>
                            <p><label>Date de fin de l'enchère :<input type="date" name="Date" /></label></p>
                            <p><label>Heure de fin de l'enchère :<input type="time" name="Heure" min="09:00" max="18:00" /></label></p>
                            <p><label>Prix de départ des enchères :<input type="number" name="PrixE" /> €</label></p>
                            <p><label>Photo :<input type="file" name="Photo" accept="image/*"/></label></p>
                            <p><label>Video :<input type="file" name="Video" accept="video/*"/></label></p>
                            <p><input type="submit" value="Ajouter l'item" /></p>
                        </form>
                    </div>

                    <!-- Le pied de page -->
                    
                    <?php include("footer.php"); ?>
                    
                    </body>
                </html>

                <?php
            }
            else
            {
                ?>
                <!-- a modif-->
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="utf-8" />
                        <title>Formulaire de vente</title>
                    </head>
                
                    <body>
                
                    <?php include("header.php"); ?>
                    
                    <?php include("menu.php"); ?>
                    
                    <!-- Le corps -->
                    
                    <div id="corps">
                        <h1>Formulaire de vente</h1>
                        <p>Vous n'avez pas accès à cette fonctionnalité</p>
                    </div>
                    <!-- Le pied de page -->
                    
                    <?php include("footer.php"); ?>
                    
                    </body>
                </html>

                <?php
            }
        }
        else
        {
            echo "Erreur : accès à la base de donnée échouée !";
        }  
        //fermer la connexion
        mysqli_close($db_handle);
    else
    {
        ?>
            <!-- a modif-->
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Formulaire de vente</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Formulaire de vente</h1>
                    <p>Vous ne pouvez pas avoir accès à cette rubrique.</p>
                    <p>Veuilez vous connecter pour pouvoir y accèder.</p>
                    <a href="compte.html">Aller à la page de connexion</a>
                </div>
                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html>

        <?php
    }
?>