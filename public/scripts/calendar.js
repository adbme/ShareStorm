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



generateCalendar();


var joursSemaine = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"];
var nouveauxNoms = ["D", "L", "M", "M", "J", "V", "S"];
function updateDayNames() {
    var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    var dayNameElements = document.querySelectorAll("th");
    if (windowWidth < 527) {
        for (var i = 0; i < dayNameElements.length; i++) {
            dayNameElements[i].textContent = nouveauxNoms[i];
        }
    } else {
        for (var i = 0; i < dayNameElements.length; i++) {
            dayNameElements[i].textContent = joursSemaine[i];
        }
    }
}

window.addEventListener("load", updateDayNames);
window.addEventListener("resize", updateDayNames);
