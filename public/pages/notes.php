<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon réseau social</title>
</head>
<body>
    <header>
        <div class="logo">Mon réseau social</div>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Mon profil</a></li>
                <li><a href="#">Mes amis</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Paramètres</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <aside>
            <h2>Bienvenue sur mon réseau social !</h2>
            <ul>
                <li><a href="#">Nouveautés</a></li>
                <li><a href="#">Groupes</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Evénements</a></li>
            </ul>
        </aside>

        <main>
            <div class="post-form">
                <h3>Exprimez-vous !</h3>
                <form>
                    <textarea placeholder="Quoi de neuf ?"></textarea>
                    <button type="submit">Publier</button>
                </form>
            </div>
            <div class="post-list">
                <div class="post">
                    <div class="user">
                        <img src="https://via.placeholder.com/50" alt="Photo de profil">
                        <span>Nom d'utilisateur</span>
                    </div>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut libero eu tortor hendrerit eleifend. Proin a mi massa.</p>
                    </div>
                </div>
                <div class="post">
                    <div class="user">
                        <img src="https://via.placeholder.com/50" alt="Photo de profil">
                        <span>Nom d'utilisateur</span>
                    </div>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut libero eu tortor hendrerit eleifend. Proin a mi massa.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p>Mon réseau social © 2023</p>
    </footer>

<style>
    /* Styles pour le header */
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background-color: #222;
  color: #fff;
}

header h1 {
  font-size: 24px;
  margin: 0;
}

header nav ul {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

header nav li {
  margin-right: 20px;
}

header nav a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px;
}

/* Styles pour le contenu principal */
main {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 20px;
}

.card {
  width: 30%;
  margin-bottom: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px 10px 0 0;
}

.card h2 {
  font-size: 24px;
  margin: 20px;
}

.card p {
  margin: 0 20px 20px;
}

/* Styles pour le footer */
footer {
  padding: 10px 20px;
  background-color: #222;
  color: #fff;
  text-align: center;
  font-size: 14px;
}

footer p {
  margin: 0;
}

footer a {
  color: #fff;
  text-decoration: underline;
}

</style>
</body>
</html>
