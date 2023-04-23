<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- Inclure les fichiers CSS et JS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/notes.css">
</head>

<body>

    <!-- Bouton pour ouvrir la deuxième pop-up -->
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#popup2">
        Créer une catégorie
    </button>

    <!-- Bouton pour ouvrir la première pop-up -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#popup1">
        Créer une note
    </button>




    <!-- Première pop-up -->
    <div class="modal fade" id="popup2" tabindex="-1" role="dialog" aria-labelledby="popup2Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">



                    <div id="categories">
                        <h2>Créer une catégorie</h2>
                        <div>
                            <label for="nom-categorie">Nom de catégorie :</label>
                            <input type="text" id="nom-categorie" name="nom-categorie" required>
                            <label for="couleur-categorie">Couleur :</label>
                            <input type="color" id="couleur-categorie" name="couleur-categorie">
                            <button onclick="creerCategorie()">Créer la catégorie</button>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>





    <!-- Deuxième -->
    <div class="modal fade" id="popup1" tabindex="-1" role="dialog" aria-labelledby="popup1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">





                    <div id="liens">
                        <h2>Ajouter une div avec lien</h2>
                        <div>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required>
                            <label for="lien">Lien :</label>
                            <input type="text" id="lien" name="lien" required>
                            <label for="categorie">Catégorie :</label>
                            <select id="categorie" name="categorie">
                                <option value="">Choisir une catégorie</option>
                            </select>
                            <label for="image">Image :</label>
                            <input type="file" id="image" name="image">
                            <button onclick="ajouterDiv()">Ajouter</button>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<div id="container"></div>

<script>
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

</script>