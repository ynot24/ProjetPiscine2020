<!DOCTYPE html>
<html>
<head>
  <!-- Source : https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_band_complete&stacked=h -->

  <title>Connexion :  Administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="compte.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="pageaccueil.html">
        <img class="logo" src="EbayCE.png" alt="Logo">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="categorie.html">CATÉGORIE</a></li>
        <li><a href="achat.html">ACHAT</a></li>
        <li><a href="vente.html">VENTE</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">PLUS
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="mon_compte.php">MON COMPTE</a></li>
            <li><a href="mon panier.html">MON PANIER</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

  <div class="row">
    <div class="description">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <br><br><br>
            <center><h1>Bonjour Administrateur</h1>
          <h2>Veuillez vous connecter</h2>
          <br>
          <form action="connexion_admin.php" method="POST">
            <label><h3>Votre adresse mail</h3></label><br>
            <input type="text" id="email" name="Mail" minlength="8" required><br>
            <label><h3>Mot de passe (8 caractères minimum)</h3></label><br>
            <input type="password" id="pass" name="MotDePasse" value="" minlength="8" required><br>
            <br>
            <button type="submit" class="btn btn-outline-secondary btn-lg">Se connecter</button>
          </form>
          </br>
          </center>
       </div>
    </div>
  </div>

  <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12"></div>
  </div>

<!-- Footer -->
<footer>
    <footer class="page-footer">
       <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
           <center><h3>LIENS UTILES</h3><br>
           <p><a href="mon_compte.php">Mon compte</a></p>
           <p><a href="monpanier.html">Mon panier</a></p>
           <p><a href="mentionslegales.html">Mentions légales</a></p>
           </center>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <center><h3 class="text-uppercase font-weight-bold">BESOIN D'AIDE ?</h3><br>
             <p><a href="assistance.html">Assistance</a></p>
             <p><a href="contacts.html">Nous contacter</a></p>
           </center>
          </div>
        </div>
      </div>
       <div class="footer-copyright text-center">Copyright &copy; 2020 | EbayCE France</div>
    </footer>
</footer>
</body>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
