const taskCheckboxes = document.querySelectorAll('.task-checkbox');
const progressBar = document.querySelector('.progress-bar');
const addTaskButton = document.querySelector('.add-task button');
const taskCount = document.querySelector('#h2Count');

// Met à jour la barre de progression en fonction du nombre de cases à cocher cochées
function updateProgressBar() {
    const checkboxes = document.querySelectorAll('.task-checkbox');
    const checkedCount = Array.from(checkboxes).filter((checkbox) => checkbox.checked).length;
    const progressPercent = (checkedCount / checkboxes.length) * 100;

    progressBar.style.width = `${progressPercent}%`;

    // Met à jour le compteur de tâches
    taskCount.textContent = `${checkedCount}/${checkboxes.length}`;
}

// Utilise la délégation d'événements pour gérer les clics sur les cases à cocher
const taskList = document.querySelector('.task-list');
taskList.addEventListener('click', function (event) {
    const target = event.target;

    if (target.classList.contains('task-checkbox')) {
        updateProgressBar();
    }
});

// Gère l'ajout de nouvelles tâches
addTaskButton.addEventListener('click', function () {
    const newTaskInput = document.querySelector('.add-task input[type="text"]');
    const newTaskTitle = newTaskInput.value;

    if (newTaskTitle.trim() !== '') {
        const newTask = document.createElement('li');
        newTask.innerHTML = `<input type="checkbox" class="task-checkbox"><span class="task-title">${newTaskTitle}</span>`;
        taskList.appendChild(newTask);

        // Réinitialise l'input de nouvelle tâche
        newTaskInput.value = '';

        // Met à jour la barre de progression et le compteur de tâches
        updateProgressBar();
    }
});


// localstorage system

let boxes = document.getElementsByClassName('task-checkbox').length;

function save() {
    for (let i = 1; i <= boxes; i++) {
        var checkbox = document.getElementById(String(i));
        localStorage.setItem("checkbox" + String(i), checkbox.checked);
    }
}

//for loading
for (let i = 1; i <= boxes; i++) {
    if (localStorage.length > 0) {
        var checked = JSON.parse(localStorage.getItem("checkbox" + String(i)));
        document.getElementById(String(i)).checked = checked;
    }
}
window.addEventListener('change', save);