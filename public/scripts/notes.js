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
    categorie.setAttribute("data-nom-categorie", nomCategorie);
    categorie.style.backgroundColor = couleurCategorie;
    categorie.style.marginTop = "10px";
    categorie.style.padding = "10px";
    categorie.style.cursor = "pointer";
    categorie.innerHTML = "<h3>" + nomCategorie + "</h3>";
    document.getElementById("container").appendChild(categorie);
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
    div.innerHTML = "<h2>" + nom + "</h2>";
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
    var preview = document.querySelector('img');
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