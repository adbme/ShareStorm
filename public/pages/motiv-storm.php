
<head>
  <meta charset="UTF-8">
  <title>Motiv Storm</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css" />
  <link rel="stylesheet" href="../styles/motiv-storm.css">

</head>
<main>



  <div class="glide">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides">
        <li class="glide__slide div" style="background-color: #F44336;"><h2>Slide 1</h2></li>
        <li class="glide__slide div" style="background-color: #2196F3;"><h2>Slide 2</h2></li>
        <li class="glide__slide div" style="background-color: #4CAF50;"><h2>Slide 3</h2></li>
        <li class="glide__slide div" style="background-color: #FFEB3B;"><h2>Slide 4</h2></li>
        <li class="glide__slide div" style="background-color: #9C27B0;"><h2>Slide 5</h2></li>
  
      </ul>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
    </div>
  </div>
  </main>


<footer>
  <div class="left-side">
    <div class="dropdown-menu">
        <div class="img-menu-div">
            a
      </div>
      
      <div class="dropdown-content">
        <a href="#">Lien 1</a>
        <a href="#">Lien 2</a>
        <a href="#">Lien 3</a>
      </div>
    </div>
  </div>
  <div class="middle">
    <img src="../images/storm-white.svg" alt="Votre image centrée" />
  </div>
  <div class="right-side">
    <div class="button-container">
       <button class="button-playstop" id="play" onclick="play()"><img src="../images/play.svg" alt=""><p style="margin-left: 10px">AUTO PLAY</p></button>
       <button class="button-playstop" id="stop" onclick="stop()"><img  src="../images/stop.svg" alt=""> <p style="margin-left: 10px">STOP PLAY</p> </button>
    </div>
  </div>
</footer>







  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
<script>
  const glide = new Glide('.glide', {
    type: 'carousel',
    perView: 3,
    focusAt: 'center',
    gap: 30,
    autoplay: 1000, // temps en millisecondes 
    breakpoints: {
      800: {
        perView: 2
      },
      600: {
        perView: 1
      }
    }
  });

  // fonction pour démarrer l'autoplay
  function startAutoplay() {
    glide.settings.autoplay = 1000;
    glide.play();
  }

  // fonction pour arrêter l'autoplay
  function stopAutoplay() {
    glide.settings.autoplay = false;
    glide.pause();
  }

  // attacher les événements aux boutons play et stop
  const playBtn = document.getElementById('play');
  const stopBtn = document.getElementById('stop');

  playBtn.addEventListener('click', startAutoplay);
  stopBtn.addEventListener('click', stopAutoplay);

  glide.mount();
</script>


  <script>

function play(){
    const glide = document.querySelector('.glide').glide;
    glide.settings.autoplay = 800;
    glide.play();
}

function stop(){
    const glide = document.querySelector('.glide').glide;
    glide.settings.autoplay = 0;
    glide.pause();
    
}



  </script>




