<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../styles/notes.css">

<div class="buttondiv">
    <!-- Bouton pour ouvrir la deuxième pop-up -->
    <button type="button" class="button-notes button-createNotes" data-toggle="modal" data-target="#popup2">
        <img src="../images/new-category.svg" class="icon-button" alt=""> NEW CATEGORYS
    </button>
    <!-- Bouton pour ouvrir la première pop-up -->
    <button type="button" class="button-notes button-createCathegory" data-toggle="modal" data-target="#popup1">
        <img src="../images/new-note.svg" class="icon-button" alt=""> NEW NOTES
    </button>
</div>

<!-- Créer une catégorie -->
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


<!-- Créer une note -->
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
                        <input type="file" id="image" name="image" onchange="previewImage()">
                        <!--apercu de l'image upload -->
                        <img src="" alt="Aperçu de l'image" id="imgPreview" style="max-width: 100%;">
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


<div id="container"></div>
<script src="../scripts/notes.js"></script>