<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/todo.css">
    <link rel="icon" href="../images/favicon.svg" type="image/svg+xml">


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








                </div>

            </div>


            <main id="main">
                <div class="col-md-10">
                    <div class="container">


                        <div class="tasks-container">
                            <h2 class="colorW">MES TACHES</h2>

                            <ul class="task-list colorW">
                                <!-- taches -->

                                <li><input id="1" type="checkbox" class="task-checkbox"><span class="task-title">Tâche
                                        1</span>
                                </li>

                                <li><input id="2" type="checkbox" class="task-checkbox"><span class="task-title">Tâche
                                        2</span>
                                </li>

                                <li><input id="3" type="checkbox" class="task-checkbox"><span class="task-title">Tâche
                                        2</span>
                                </li>
                            </ul>
                            <div class="add-task">
                                <input type="text" placeholder="Ajouter une nouvelle tâche">
                                <button>Ajouter</button>
                            </div>
                        </div>

                        <h5 class="colorW" id="h2Count"></h5>
                        <div class="progress-bar-container">
                            <div class="progress-bar"></div>
                        </div>

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
            document.getElementById("main").style.marginLeft = "10%";
            document.getElementById("main").style.marginTop = "-120";
            // document.getElementById("main").style.marginLeft = "12%";
        }
    </script>
</body>

</html>

<script src="../scripts/todo.js"></script>