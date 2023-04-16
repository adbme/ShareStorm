<style>
		/* Style pour la pop-up */
		#overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 999;
			display: none;
		}

		#overlay h1 {
			color: #fff;
			text-align: center;
			margin-top: 30%;
			font-size: 100px
		}

		.spinner {
			display: inline-block;
			width: 40px;
			height: 40px;
			margin: 0 auto;
			border-radius: 100%;
			border: 3px solid #fff;
			border-top-color: #fa7d00;
			animation: spinner 0.8s ease-in-out infinite;
		}

		@keyframes spinner {
			to { transform: rotate(360deg); }
		}

        #img-calendar{

            margin-left: 50vh;

        }
	</style>
	<script>
		function redirection1() {
			// Afficher la pop-up de chargement
			document.getElementById("overlay").style.display = "block";
			setTimeout(function() {
				window.location.href = "pages/calendar.php";
			}, 300); // secondes
		}

        function redirection2() {
			// Afficher la pop-up de chargement
			document.getElementById("overlay").style.display = "block";
			setTimeout(function() {
				window.location.href = "pages/liste.php";
			}, 300); // secondes
		}


        function redirection3() {
			// Afficher la pop-up de chargement
			document.getElementById("overlay").style.display = "block";
			setTimeout(function() {
				window.location.href = "pages/notes.php";
			}, 300); // secondes
		}

        function redirection4() {
			// Afficher la pop-up de chargement
			document.getElementById("overlay").style.display = "block";
			setTimeout(function() {
				window.location.href = "pages/motiv-storm.php";
			}, 300); // secondes
		}
	</script>
</head>
<body>


	<!-- Pop-up de chargement -->
	<div id="overlay">
		<div class="spinner"></div>
		<h1>redirection !</h1>
        <!-- <img class="img-flui" id="img-calendar" style="width: 50vh;" src="images/calendar-yellow.svg" alt="logo"> -->
	</div>