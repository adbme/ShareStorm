<!-- Bouton qui déclenche la pop-up -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="menu-shortcuts">
    Afficher les raccourcis
</button>

<!-- Pop-up -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header flex-footer">

                <div class="footer-div-shortcuts">
                    <h4 class="modal-title" id="myModalLabel">Raccourcis clavier</h4>
                    <h5 class="modal-title h5-footer" id="myModalLabel">Afin de pouvoir naviguer entre les outils et
                        pages de manière fluide et rapide, ShareStorm détient une série de raccourcis clavier toujours
                        spécifier tout en bas de la page dans le footer.</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li><kbd>m</kbd> : Menu</li>
                    <li><kbd>c</kbd> : Calendar</li>
                    <li><kbd>l</kbd> : List</li>
                    <li><kbd>n</kbd> : Notes</li>
                    <li><kbd>s</kbd> : Motiv-storms</li>
                    <li><kbd>r</kbd> : Raccourcis</li>
                </ul>
            </div>
        </div>
    </div>
</div>