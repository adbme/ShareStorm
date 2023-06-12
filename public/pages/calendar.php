<!DOCTYPE html>
<html>

<head>
    <title>Calendrier</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="calendar">
            <div class="title">
                <h1 id="selected-date">date</h1>
                <button class="leftButton" onclick="previousMonth()">&#8249;</button>
                <button onclick="nextMonth()">&#8250;</button>
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

        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <h2 id="popup-date"></h2>
                <p id="popup-message">Contenu de la pop-up</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        height: 100%;
    }

    .calendar {
        flex: 8;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .popup {
        flex: 2;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 20%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }

    .popup-content {
        position: relative;
        background-color: #FFF;
        width: 100%;
        height: 100%;
        padding: 20px;
        animation-name: slideIn;
        animation-duration: 0.5s;
        animation-timing-function: ease-in-out;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .title {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
    }

    .leftButton {
        margin-left: 20px;
        margin-right: 10px;
    }

    #month-year {
        font-size: 24px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    th {
        padding: 10px;
        background-color: #FFE455;
    }

    td {
        padding: 40px;
        cursor: pointer;
        transition: 0.3s;
        border: 1px black solid;
    }

    td:hover {
        background-color: #e6e6e6;
    }

    button {
        margin-top: 10px;
        font-size: 18px;
    }

    .current-day {
        background-color: #FFE888;
    }

    .current-day:hover {
        background-color: #FFDA42;
    }

    .previous-month,
    .next-month {
        font-weight: bold;
        cursor: pointer;
    }

    .empty-cell {
        background-color: #FFA0A0;
        color: #535353;
        text-align: center;
    }

    .empty-cell:hover {
        background-color: #FFA0A0;
    }

    @media (max-width: 600px) {
        td {
            padding: 15px;
        }
    }
</style>

<script>
    const months = [
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre",
    ];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    function generateCalendar() {
        let firstDay = new Date(currentYear, currentMonth, 1).getDay();
        let daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        let calendarBody = document.getElementById("calendar-body");
        calendarBody.innerHTML = "";

        document.getElementById("month-year").innerText =
            months[currentMonth] + " " + currentYear;

        let date = 1;

        for (let i = 0; i < 6; i++) {
            let row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    let cell = document.createElement("td");
                    let cellText = document.createTextNode("vide");
                    cell.classList.add("empty-cell");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else if (date > daysInMonth) {
                    break;
                } else {
                    let cell = document.createElement("td");
                    let cellText = document.createTextNode(date);
                    cell.appendChild(cellText);
                    row.appendChild(cell);

                    if (
                        date === currentDate.getDate() &&
                        currentMonth === currentDate.getMonth() &&
                        currentYear === currentDate.getFullYear()
                    ) {
                        cell.classList.add("current-day");
                    }

                    cell.addEventListener("click", function () {
                        let selectedDate = new Date(
                            currentYear,
                            currentMonth,
                            cell.innerText
                        );
                        let selectedDay = selectedDate.getDate();
                        let selectedMonth = months[selectedDate.getMonth()];
                        let selectedYear = selectedDate.getFullYear();
                        let selectedDateString =
                            selectedDay +
                            " " +
                            selectedMonth +
                            " " +
                            selectedYear;

                        document.getElementById(
                            "selected-date"
                        ).innerText = selectedDateString;

                        openPopup(selectedDateString);
                    });

                    date++;
                }
            }

            calendarBody.appendChild(row);
        }

        document.getElementById(
            "selected-date"
        ).innerText = currentDate.getDate() + " " + months[currentDate.getMonth()] + " " + currentDate.getFullYear();
    }

    function previousMonth() {
        currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        generateCalendar();
    }

    function nextMonth() {
        currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        generateCalendar();
    }

    function openPopup(dateString) {
        document.getElementById("popup-date").innerText = dateString;
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    generateCalendar();

</script>