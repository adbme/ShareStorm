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

// Utilise la délégation d'événements pour gérer les clics sur les cases à cocher et les boutons "Supprimer"
const taskList = document.querySelector('.task-list');
taskList.addEventListener('click', function (event) {
    const target = event.target;

    if (target.classList.contains('task-checkbox')) {
        updateProgressBar();
        save();
    } else if (target.classList.contains('delete-button')) {
        const taskItem = target.parentElement;
        taskItem.remove();
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
        const newTaskDeleteButton = document.createElement('button');

        // Trouve le nombre de tâches déjà créées pour définir l'ID de la nouvelle tâche
        const taskCount = document.querySelectorAll('.task-list li').length;
        newTaskCheckbox.id = taskCount + 1;

        newTaskCheckbox.type = 'checkbox';
        newTaskCheckbox.classList.add('task-checkbox');
        newTaskTitleSpan.classList.add('task-title');
        newTaskTitleSpan.textContent = newTaskTitle;
        newTaskDeleteButton.classList.add('delete-button');
        newTaskDeleteButton.textContent = '';

        newTask.appendChild(newTaskCheckbox);
        newTask.appendChild(newTaskTitleSpan);
        newTask.appendChild(newTaskDeleteButton);

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
            const newTaskDeleteButton = document.createElement('button');

            newTaskCheckbox.id = index + 1;
            newTaskCheckbox.type = 'checkbox';
            newTaskCheckbox.classList.add('task-checkbox');
            newTaskCheckbox.checked = task.completed;
            newTaskTitleSpan.classList.add('task-title');
            newTaskTitleSpan.textContent = task.title;
            newTaskDeleteButton.classList.add('delete-button');
            newTaskDeleteButton.textContent = '';

            newTask.appendChild(newTaskCheckbox);
            newTask.appendChild(newTaskTitleSpan);
            newTask.appendChild(newTaskDeleteButton);

            taskList.appendChild(newTask);
        }

        // Met à jour la barre de progression
        updateProgressBar();
    }
}

// Enregistre les tâches dans le stockage local
function save() {
    const tasks = []; for (const taskItem of taskList.children) {
        const taskCheckbox = taskItem.querySelector('.task-checkbox');
        const taskTitle = taskItem.querySelector('.task-title').textContent;
        const taskCompleted = taskCheckbox.checked;

        tasks.push({ title: taskTitle, completed: taskCompleted });
    }

    localStorage.setItem('tasks', JSON.stringify(tasks));

}

// Charge les tâches depuis le stockage local lors du chargement de la page
load();

function confirmDelete() {
    if (confirm("Êtes-vous sûr de vouloir supprimer toutes les tâches finies ?")) {
        // si l'utilisateur clique sur "OK" dans la boîte de dialogue de confirmation,
        // appelez la fonction "deleteCheckedTasks()"
        deleteCheckedTasks();
    }
}


// Fonction pour supprimer toutes les cases cochées
function deleteCheckedTasks() {
    const checkedTasks = document.querySelectorAll('.task-checkbox:checked');
    checkedTasks.forEach((task) => {
        const taskItem = task.parentElement;
        taskItem.remove();
    });
    updateProgressBar();
    save();
}

