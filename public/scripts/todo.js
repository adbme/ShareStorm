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

        // Trouve le nombre de tâches déjà créées pour définir l'ID de la nouvelle tâche
        const taskCount = document.querySelectorAll('.task-list li').length;
        newTaskCheckbox.id = taskCount + 1;

        newTaskCheckbox.type = 'checkbox';
        newTaskCheckbox.classList.add('task-checkbox');
        newTaskTitleSpan.classList.add('task-title');
        newTaskTitleSpan.textContent = newTaskTitle;

        newTask.appendChild(newTaskCheckbox);
        newTask.appendChild(newTaskTitleSpan);

        taskList.appendChild(newTask);

        // Réinitialise l'input de nouvelle tâche
        newTaskInput.value = '';

        // Met à jour la barre de progression
        updateProgressBar();

        // Enregistre les tâches
        save();
    }
});

// Charge les tâches depuis le stockage local
function load() {
    const tasks = JSON.parse(localStorage.getItem('tasks'));

    if (tasks) {
        for (const [index, task] of tasks.entries()) {
            const newTask = document.createElement('li');
            const newTaskCheckbox = document.createElement('input');
            const newTaskTitleSpan = document.createElement('span');

            newTaskCheckbox.id = index + 1;
            newTaskCheckbox.type = 'checkbox';
            newTaskCheckbox.classList.add('task-checkbox');
            newTaskCheckbox.checked = task.completed;
            newTaskTitleSpan.classList.add('task-title');
            newTaskTitleSpan.textContent = task.title;

            newTask.appendChild(newTaskCheckbox);
            newTask.appendChild(newTaskTitleSpan);

            taskList.appendChild(newTask);
        }

        updateProgressBar();
    }
}

// Enregistre les tâches dans le stockage local
function save() {
    const tasks = [];

    for (const taskElement of document.querySelectorAll('.task-list li')) {
        const taskCheckbox = taskElement.querySelector('.task-checkbox');
        const taskTitle = taskElement.querySelector('.task-title');

        tasks.push({
            title: taskTitle.textContent,
            completed: taskCheckbox.checked,
        });
    }

    localStorage.setItem
        ('tasks', JSON.stringify(tasks));
}

// Appelle la fonction load() pour charger les tâches depuis le stockage local au chargement de la page
load();