<?php

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<script src="https://unpkg.com/scrollreveal"></script>


<!-- CSS Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <!-- js Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">




<link rel="stylesheet" href="/styles/main.css">

<header>
  <div class="dropdown" id="dropdown">
    <button class="btn btn-transparent" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #23272B">
      <img class="img-flui animated infinite pulse" style="width: 70px" src="images/logo.svg" alt="logo">
    </button>
    
    
    <ul class="dropdown-menu animate__animated animate__fadeIn menu">
     
      <a class="dropdown-item" href="#">
      <img class="img-flui" style="width: 40%" src="images/calendar.svg" alt="logo">
      </a>

     <a class="dropdown-item" href="#">
      <img class="img-flui" style="width: 40%" src="images/notes.svg" alt="logo">
      </a>

 <a class="dropdown-item" href="#">
      <img class="img-flui" style="width: 40%" src="images/liste.svg" alt="logo">
      </a>
</ul>

      
    



    

  </div>
</header>

<script>
  const dropdownBtn = document.getElementById('dropdownMenuButton');
const dropdown = document.querySelector('.dropdown');

dropdown.addEventListener('shown.bs.dropdown', function() {
  dropdown.style.width = '300px';
});

dropdown.addEventListener('hidden.bs.dropdown', function() {
  dropdown.style.width = '';
});

</script>

<!-- pop up -->
<script>
    $(document).ready(function(){
      // Activer le fond flou lorsque la pop-up est ouverte
      $('.modal').on('shown.bs.modal', function () {
        $(document.body).addClass('modal-open');
      });
      // Désactiver le fond flou lorsque la pop-up est fermée
      $('.modal').on('hidden.bs.modal', function () {
        $(document.body).removeClass('modal-open');
      });
    });
  </script>






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
  animateLogo();
});

function animateLogo() {
  $(".animated").animate({opacity: 0.5}, 1000).animate({opacity: 1}, 1000, animateLogo);
}
</script>








<main class="d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-6" style="background-color: ;">
        <div class="" style="height: 100%;">
          <img src="/images/storm-main.png" alt="" class="img-fluid ml-auto storm-image">
        </div>
      </div>

      <div class="col-sm-6" style="background-color: ;">
        <h1 class="share" style="font-size: 10vw;">SHARE</h1>
        <h1 class="storm" style="font-size: 10vw;">STORM</h1>
      </div>
    </div>
  </div>  
</main>


<div class="container-test">
  <div class="row">
    <div class="col-12 sr">
      <div class="d-flex align-items-center mb-3">
        
        <h1 class="mb-0" style="margin-left: 30px; font-size: 50px; color: white; display: flex; align-items: center; height: 130px;"> <div class="gs-div"><p class="gs">></p></div> Getting Started</h1>
      </div >
      <hr class="mb-5" style="height: 3px; background-color: white;">
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 mb-4 sr" >
    <a  href="pages/calendar.php"><div class="card text-center bg-dark">
        <div class="card-body d-flex align-items-center justify-content-center  img-1 img-yellow">
          
        </div>
      </div></a>
    </div>

    <div class="col-lg-6 col-md-6 mb-4 sr">
       <a href="pages/calendar.php"><div class="card text-center bg-dark">
        
     <div class="card-body d-flex align-items-center justify-content-center img-2 ">
         
        </div>
      </div></a>
    </div>

    <div class="col-lg-6 col-md-6 mb-4 sr">
    <a href="pages/calendar.php"><div class="card text-center bg-dark">
        <div class="card-body d-flex align-items-center justify-content-center img-3 ">
          
        </div>
      </div></a>
    </div>
    
    <div class="col-lg-6 col-md-6 mb-4 sr">
    <a href="pages/calendar.php"><div class="card text-center bg-dark">
        <div class="card-body d-flex align-items-center justify-content-center img-4 ">
          
        </div>
      </div></a>
    </div>
  </div>
  
  <div class="row">
  <div class="col-12 sr">
    <hr class="mb-5" style="height: 3px; background-color: white;">
    <p style="font-size: 20px; color: white;">Copyright © [2023] [pas de copyright mgl]. Tous droits réservés.</p>
  </div>



<!-- Bouton qui déclenche la pop-up -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Afficher les raccourcis
  </button>

  <!-- Pop-up -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Raccourcis clavier</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul>
            <li><kbd>m</kbd> : Menu</li>
            <li><kbd>c</kbd> : Calendar</li>
            <li><kbd>l</kbd> : List</li>
            <li><kbd>n</kbd> : Notes</li>
            <li><kbd>s</kbd> : Motiv-storms</li>
          </ul>
        </div>
      </div>
    </div>
  </div>


</div>





<script>
  ScrollReveal().reveal('.sr', { delay: 200, duration: 800, easing: 'cubic-bezier(0.5, 0, 0, 1)' });
</script>

<script>
  document.addEventListener('keydown', function(event) {
    if (event.key === 'm') {
      document.querySelector('#dropdownMenuButton').click();
    }
  });
</script>

<?php require "pages/chargement.php"?>


<script src="scripts/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>