<span class="close" onclick="closePopup()">&times;</span>
<h2 id="popup-date"></h2>
<p id="popup-message">Contenu de la pop-up</p>

<button onclick="addTask()">Ajouter une tâche</button>

<div id="task-container"></div>

<script>
    let taskId = 1; // Identifiant de la tâche

    function addTask() {
        const taskContainer = document.getElementById("task-container");

        // Créer les éléments de la tâche
        const taskDiv = document.createElement("div");
        taskDiv.classList.add("task");

        const durationInput = document.createElement("input");
        durationInput.type = "text";
        durationInput.placeholder = "Durée";

        const textInput = document.createElement("input");
        textInput.type = "text";
        textInput.placeholder = "Description";

        const checkboxInput = document.createElement("input");
        checkboxInput.type = "checkbox";

        const notesInput = document.createElement("input");
        notesInput.type = "text";
        notesInput.placeholder = "Notes";

        // Ajouter les éléments à la div de la tâche
        taskDiv.appendChild(durationInput);
        taskDiv.appendChild(textInput);
        taskDiv.appendChild(checkboxInput);
        taskDiv.appendChild(notesInput);

        // Ajouter la tâche à la liste des tâches
        taskContainer.appendChild(taskDiv);

        // Incrémenter l'identifiant de la tâche
        taskId++;
    }

</script>