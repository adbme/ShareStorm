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
        save();
    }
});

// Gère l'ajout de nouvelles tâches
addTaskButton.addEventListener('click', function () {
    const newTaskInput = document.querySelector('.add-task input[type="text"]');
    const newTaskTitle = newTaskInput.value;

    if (newTaskTitle.trim() !== '') {
        const newTask = document.createElement('li');
        const newTaskCheckbox = document.createElement('input');
        const newTaskTitleSpan = document.createElement('span');

        newTaskCheckbox.type = 'checkbox';
        newTaskCheckbox.classList.add('task-checkbox');
        newTaskTitleSpan.classList.add('task-title');
        newTaskTitleSpan.textContent = newTaskTitle;

        newTask.appendChild(newTaskCheckbox);
        newTask.appendChild(newTaskTitleSpan);

        taskList.appendChild(newTask);

        // Réinitialise l'input de nouvelle tâche
        newTaskInput.value = '';

        // Met à jour la barre de progression et le compteur de tâches
        updateProgressBar();
        save();
    }
});

// Sauvegarde l'état des cases à cocher dans le localStorage
function save() {
    const checkboxes = document.querySelectorAll('.task-checkbox');

    for (let i = 0; i < checkboxes.length; i++) {
        localStorage.setItem(`task-${i}`, checkboxes[i].checked);
    }
}

// Charge l'état des cases à cocher depuis le localStorage
function load() {
    const checkboxes = document.querySelectorAll('.task-checkbox');

    for (let i = 0; i < checkboxes.length; i++) {
        const checkbox = checkboxes[i];
        const checked = JSON.parse(localStorage.getItem(`task-${i}`));

        if (checked !== null) {
            checkbox.checked = checked;
        }
    }
}

// Charge l'état des cases à cocher au chargement de la page
load();

// Met à jour la barre de progression et le compteur de tâches au chargement de la page
updateProgressBar();
