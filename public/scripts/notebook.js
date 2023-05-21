// Fonction pour mettre à jour le nombre de notes dans chaque catégorie
function updateNoteCount() {
    const noteCounts = document.querySelectorAll('.note-count');
  
    noteCounts.forEach(noteCount => {
      const tabId = noteCount.parentNode.dataset.tabTarget;
      const tabContent = document.querySelector(tabId);
      const notes = tabContent.querySelectorAll('.noteDiv');
  
      let noteCountValue = 0;
      notes.forEach(note => {
        if (note.style.display !== 'none') { // Vérifier si la note est affichée
          noteCountValue++;
        }
      });
  
      noteCount.textContent = noteCountValue;
    });
  }
  
  const addTabButton = document.getElementById('add-tab');
  const addNoteButton = document.getElementById('add-note');
  let tabs = document.querySelectorAll('[data-tab-target]');
  let tabContents = document.querySelectorAll('[data-tab-content]');
  
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const target = document.querySelector(tab.dataset.tabTarget);
      tabContents.forEach(tabContent => {
        tabContent.classList.remove('active');
      });
      tabs.forEach(tab => {
        tab.classList.remove('active');
      });
      tab.classList.add('active');
      target.classList.add('active');
    });
  });
  
  addTabButton.addEventListener('click', () => {
    const newTabName = prompt("Entrez le nom de la nouvelle catégorie");
    if (newTabName) {
      const newTabId = newTabName.replace(/\s+/g, '-').toLowerCase();
      const newTabContent = document.createElement('div');
      newTabContent.setAttribute('data-tab-content', '');
      newTabContent.setAttribute('id', newTabId);
      newTabContent.innerHTML = `
        <h1>${newTabName}</h1>
        <p>This is the new tab content</p>
      `;
      document.querySelector('.tab-content').appendChild(newTabContent);
      const newTab = document.createElement('li');
      newTab.setAttribute('data-tab-target', `#${newTabId}`);
      newTab.classList.add('tab');
      newTab.innerHTML = `${newTabName} <span class="note-count">0</span>`;
      const tabsContainer = document.querySelector('.tabs');
      tabsContainer.insertBefore(newTab, tabsContainer.lastElementChild.nextSibling);
      tabs = document.querySelectorAll('[data-tab-target]');
      tabContents = document.querySelectorAll('[data-tab-content]');
  
      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          const target = document.querySelector(tab.dataset.tabTarget);
          tabContents.forEach(tabContent => {
            tabContent.classList.remove('active');
          });
          tabs.forEach(tab => {
            tab.classList.remove('active');
          });
          tab.classList.add('active');
          target.classList.add('active');
        });
      });
  
      updateNoteCount(); // Mettre à jour le nombre de notes après l'ajout d'une nouvelle catégorie
  
      showAlert('✅ New category successfully added / Nouvelle catégorie ajoutée avec succès', 'alert-success', 3000);
    }
  });
  
  addNoteButton.addEventListener('click', () => {
    const selectedTab = document.querySelector('.tab.active');
    if (selectedTab) {
      const tabId = selectedTab.dataset.tabTarget;
      const tabContent = document.querySelector(tabId);
      const noteTitle = prompt("Entrez le titre de la note");
      if (noteTitle) {
        const newNote = document.createElement('div');
        newNote.classList.add('note');
        newNote.className = 'noteDiv';
  
        newNote.innerHTML = `
          <h3>${noteTitle}</h3>
        `;
        tabContent.appendChild(newNote);
  
        updateNoteCount(); // Mettre à jour le nombre de notes après l'ajout d'une nouvelle note
  
        showAlert('✅ New note successfully added / Nouvelle note ajoutée avec succès', 'alert-success', 2000);
      }
    }
  });
  
  // Gestionnaire d'événement pour l'événement 'input' du champ de recherche
  const searchInput = document.getElementById('search-input');
  searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value.toLowerCase(); // Obtenir le terme de recherche et le convertir en minuscules
  
    // Parcourir toutes les notes
    const notes = document.querySelectorAll('.noteDiv');
    let noteFound = false;
    notes.forEach(note => {
      const noteTitle = note.querySelector('h3').textContent.toLowerCase(); // Obtenir le titre de la note et le convertir en minuscules
  
      // Vérifier si le titre de la note correspond au terme de recherche
      if (noteTitle.includes(searchTerm)) {
        note.style.display = 'block'; // Afficher la note si elle correspond
        noteFound = true;
      } else {
        note.style.display = 'none'; // Masquer la note sinon
      }
    });
  
    updateNoteCount(); // Mettre à jour le nombre de notes après la recherche
  
    if (!noteFound) {
      showAlert('💀 No notes found with this search term / Aucune note trouvée avec ce terme de recherche', 'alert-warning', 3000);
    }
  });
  
  // Fonction pour afficher une alerte Bootstrap avec une barre de progression
  // Fonction pour afficher une alerte Bootstrap avec une barre de progression
function showAlert(message, alertClass, duration) {
    const alertDiv = document.createElement('div');
    alertDiv.classList.add('alert', alertClass, 'position-relative');
    alertDiv.setAttribute('role', 'alert');
  
    const progressBar = document.createElement('div');
    progressBar.classList.add('progress', 'mb-2');
    progressBar.innerHTML = `
      <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    `;
  
    const messageDiv = document.createElement('div');
    messageDiv.textContent = message;
  
    alertDiv.appendChild(progressBar);
    alertDiv.appendChild(messageDiv);
  
    const main = document.getElementById('main');
    main.insertBefore(alertDiv, main.firstChild);
  
    // Animer la barre de progression
    const progressBarElement = alertDiv.querySelector('.progress-bar');
    let width = 0;
    const progressBarDuration = duration * 0.8; // Durée de la barre de progression (80% de la durée totale)
    const interval = setInterval(() => {
      width++;
      progressBarElement.style.width = `${width}%`;
      if (width === 100) {
        clearInterval(interval);
        setTimeout(() => {
          alertDiv.style.opacity = '0'; // Appliquer l'effet de disparition
          setTimeout(() => {
            alertDiv.remove();
          }, 200); // Attendre 200 ms avant de supprimer le message
        }, duration * 0.2); // Attendre 20% de la durée totale avant de déclencher l'effet de disparition
      }
    }, progressBarDuration / 100);
  
    setTimeout(() => {
      alertDiv.style.transform = 'translateY(0)'; // Appliquer l'effet d'entrée
    }, 10); // Attendre 10 ms avant d'appliquer l'effet d'entrée
  
    setTimeout(() => {
      alertDiv.style.opacity = '0'; // Appliquer l'effet de disparition
      setTimeout(() => {
        alertDiv.remove();
      }, 200); // Attendre 200 ms avant de supprimer le message
    }, duration);
  }
  