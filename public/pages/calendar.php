<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="../styles/calendar.css">

    <link rel="icon" href="../images/favicon.svg" type="image/svg+xml">
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
                    <!-- contenu -->
                    <button class="btn btn-primary" onclick="addTask()">Ajouter une tâche</button>
                    <div id="task-container"></div>
                </div>
            </div>
            <main id="main">
                <div class="container">
                    <div class="calendar">
                        <div class="title">
                            <h1 id="selected-date">date</h1>
                            <div class="buttonDiv">
                                <button class="leftButton button" onclick="previousMonth()">&#8249;</button>
                                <button class="button" onclick="nextMonth()">&#8250;</button>
                            </div>
                        </div>
                        <h1 id="month-year"></h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Dim</th>
                                    <th>Lun</th>
                                    <th>Mar</th>
                                    <th>Mer</th>
                                    <th>Jeu</th>
                                    <th>Ven</th>
                                    <th>Sam</th>
                                </tr>
                            </thead>
                            <tbody id="calendar-body"></tbody>
                        </table>
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
        }


    </script>
    <script src="../scripts/calendar.js"></script>
</body>

</html>