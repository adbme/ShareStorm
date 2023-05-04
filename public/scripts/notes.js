function creerCategorie() {
    var nomCategorie = document.getElementById("nom-categorie").value.trim();
    var couleurCategorie = document.getElementById("couleur-categorie").value;
    // Vérification que le champ nom de catégorie est rempli
    if (nomCategorie === "") {
        alert("Le champ nom de catégorie est obligatoire.");
        return;
    }
    // Vérification que le nom de catégorie n'existe pas déjà
    var categories = document.getElementsByClassName("categorie");
    for (var i = 0; i < categories.length; i++) {
        if (categories[i].getAttribute("data-nom-categorie") === nomCategorie) {
            alert("Une catégorie avec ce nom existe déjà.");
            return;
        }
    }
    // Création de la catégorie
    var categorie = document.createElement("div");
    categorie.className = "categorie";
    categorie.id = "DivCategorie";
    categorie.setAttribute("data-nom-categorie", nomCategorie);
    categorie.style.backgroundColor = couleurCategorie;
    categorie.style.marginTop = "10px";
    categorie.style.padding = "10px";
    categorie.style.opacity = "0.5";
    categorie.style.transition = "0.5s";
    categorie.style.color = "#E0E0E0";

    categorie.addEventListener("mouseenter", function () { // changement de "mouseover" à "mouseenter"
        categorie.style.color = "#FFE888";
        categorie.style.opacity = "1";
        categorie.style.backgroundColor = "#1E1E1E"; // la couleur change
        barre.style.backgroundColor = "#FFE888";
    });

    categorie.addEventListener("mouseleave", function () { // changement de "mouseout" à "mouseleave"
        categorie.style.opacity = "0.5";
        categorie.style.color = "#E0E0E0";
        categorie.style.backgroundColor = couleurCategorie; // la couleur est restaurée
        barre.style.backgroundColor = "#E0E0E0";
    });

    categorie.innerHTML = "<h2>" + nomCategorie + "</h2>";

    // Création de la barre
    var barre = document.createElement("div");
    barre.style.height = "3px";
    barre.style.borderRadius = "30px";
    barre.style.backgroundColor = "#E0E0E0";
    barre.style.marginBottom = "20px"
    barre.style.transition = "0.5s";
    categorie.appendChild(barre);

    document.querySelector("main").appendChild(categorie);

    // Ajout de la catégorie à la liste des choix dans la sélection
    var option = document.createElement("option");
    option.value = nomCategorie;
    option.innerHTML = nomCategorie;
    document.getElementById("categorie").appendChild(option);

}

function ajouterDiv() {
    var nom = document.getElementById("nom").value;
    var lien = document.getElementById("lien").value;
    var categorie = document.getElementById("categorie").value;
    var image = document.getElementById("image").files[0];
    // Vérification que le champ nom et le champ lien sont remplis
    if (nom === "" || lien === "") {
        alert("Le champ nom et le champ lien sont obligatoires.");
        return;
    }
    // Vérification que la catégorie est sélectionnée
    if (categorie === "") {
        alert("Veuillez sélectionner une catégorie.");
        return;
    }
    // Récupération de la catégorie correspondante
    var container = document.querySelector('[data-nom-categorie="' + categorie + '"]');

    // Création de la div contenant le lien
    var div = document.createElement("div");
    div.className = "DivLiens"
    div.innerHTML = "<h2 class='title-div-links'>" + nom + "</h2>";
    if (image) {
        var reader = new FileReader();
        reader.onload = function (e) {
            div.style.backgroundImage = "url('" + e.target.result + "')";
        }
        reader.readAsDataURL(image);
    } else {
        div.style.backgroundColor = "#2D2930";
    }

    div.style.display = "flex"

    div.style.padding = "2%";
    div.style.height = "30%";
    div.style.float = "none";
    div.style.display = "inline-block";
    // div.style.marginLeft = "2%"
    // div.style.marginTop = "2%"
    div.style.borderRadius = "10px";


    div.style.width = "30%";


    function updateStyles() {
        const width = window.innerWidth;

        // Si la fenêtre est suffisamment large
        if (width > 992) {
            div.style.width = '30%';
            div.style.marginLeft = '3%';
            div.style.marginTop = '3%';
            div.style.marginBottom = '3%';
            div.style.flex = '0 0 calc(30% - 4% - 2% - 2% - 2px)';
        }
        // Si la fenêtre est moyennement large
        else if (width <= 992 && width > 768) {
            div.style.width = '45%';
            div.style.marginLeft = '2.5%';
            div.style.marginTop = '2.5%';
            div.style.flex = '0 0 calc(45% - 5% - 2.5% - 2.5% - 2px)';
        }
        // Si la fenêtre est plus étroite
        else {
            div.style.width = '100%';
            div.style.marginLeft = '0';
            div.style.marginTop = '5%';
            div.style.flex = '0 0 calc(100% - 0 - 0 - 5% - 2px)';
        }
    }

    // Mettre à jour les styles initiaux
    updateStyles();

    // Ajouter un écouteur d'événements pour la taille de la fenêtre
    window.addEventListener('resize', updateStyles);

    div.addEventListener("click", function () {
        window.open(lien);
    });
    // Si une image a été ajoutée, on l'inclut dans la div
    if (image) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.createElement("img");
            img.src = e.target.result;
            div.insertBefore(img, div.firstChild);

        }
        reader.readAsDataURL(image);
    }
    container.appendChild(div);

}


function previewImage() {
    var preview = document.getElementById('imgPreview');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}