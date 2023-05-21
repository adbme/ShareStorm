<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/notebook.css">
    <link rel="stylesheet" href="../styles/notes.css">
    <link rel="icon" href="../images/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



    <style>

    </style>
</head>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <button class="btn btn-primary button-menu" onclick="openNav()">></button>
            <div id="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                    <button class="btn btn-primary button2-menu" onclick="closeNav()">
                        < </button>
                </a>

                <div class="buttondiv">
                    <!-- contenu de la sidebar -->
                    <button type="button" class="button-notes button-createNotes" id="add-tab">
                        <img src="../images/new-category.svg" class="icon-button" alt=""> NEW CATEGORYS
                    </button>
                    <!-- Bouton pour ouvrir la première pop-up -->
                    <button type="button" class="button-notes button-createCathegory" id="add-note">
                        <img src="../images/new-note.svg" class="icon-button" alt=""> NEW NOTES
                    </button>
                </div>

                <h5 class="top">FILTER NOTES BY NAME</h5>
                <input type="text" id="search-input" placeholder="Rechercher...">

                <label for="checkbox">hide memnu</label>
                <input type="checkbox" id="checkbox" onchange="toggleDivVisibility()">


            </div>
        </div>
        <?php require "tools/menu.php" ?>
        <main id="main">
            <!-- contenu du main -->
            <ul class="tabs">
                <li data-tab-target="#home" class="active tab">Catégorie 1 <span class="note-count">0</span></li>
                <li data-tab-target="#pricing" class="tab">Catégorie 2 <span class="note-count">0</span></li>
                <li data-tab-target="#about" class="tab">Catégorie 3 <span class="note-count">0</span></li>
                <li data-tab-target="#news" class="tab">Catégorie 4 <span class="note-count">0</span></li>
            </ul>


            <div class="tab-content">
                <div id="home" data-tab-content class="active">
                    <h1>Home</h1>
                    <p>This is the home</p>
                </div>
                <div id="pricing" data-tab-content>
                    <h1>Pricing</h1>
                    <p>Some information on pricing</p>
                </div>
                <div id="about" data-tab-content>
                    <h1>About</h1>
                    <p>Let me tell you about me</p>
                </div>
                <div id="news" data-tab-content>
                    <h1>News</h1>
                    <p>News is great.</p>
                </div>
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
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("main").style.marginTop = "-120";
        // document.getElementById("main").style.marginLeft = "12%";
    }
</script>
</body>

</html>

<script src="../scripts/notebook.js"></script>