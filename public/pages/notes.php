<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/notes.css">

    <style>

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-primary button-menu" onclick="openNav()">></button>
                <div id="sidebar">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">

                        <button class="btn btn-primary button2-menu" onclick="closeNav()">
                            < </button>

                    </a>
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>

                    <?php require "notes-tools/button-system.php"
                        ?>


                </div>
            </div>

            <main id="main">
                <div class="col-md-10">
                    <div class="arrow-container">
                        <div class="arrow"></div>
                        <h1>Créez d'abord vos catégories et ajoutez-y ensuite vos notes</h1>
                    </div>
                    <p>Jouez avec les couleurs de vos dossiers, customisez les widget de vos notes avec les images de
                        votre choix, basculez aussi sur un thème de site qui vous va le mieux !</p>
                </div>
            </main>




        </div>
    </div>
    <script>
        function openNav() {
            document.getElementById("sidebar").style.width = "20%";
            document.getElementById("main").style.marginLeft = "20%";
            document.getElementById("main").style.marginTop = "-120px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "10%";
            document.getElementById("main").style.marginTop = "-120";
            // document.getElementById("main").style.marginLeft = "12%";
        }
    </script>
</body>

</html>