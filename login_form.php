<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/login.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>

    <body>

        <?php 
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="error">Remplissez tous les champs</p>';
                } else if ($_GET['error'] == "wrongpassword") {
                    echo '<p class="error">Mot de passe incorrect</p>';
                } else if ($_GET['error'] == "nouser") {
                    echo '<p class="error">Utilisateur inexistant</p>';
                } else if ($_GET['error'] == "account_created") {
                    echo '<p class="error">Un mail vous a été envoyé avec un code de vérification</p>';
                } else if ($_GET['error'] == "account_not_verified") {
                    echo '<p class="error">Le compte n\'a pas été vérifié</p>';
                } else if ($_GET['error'] == "account_verified") {
                    echo '<p class="error">Le compte a été vérifié</p>';
                } else if ($_GET['error'] == "token_expired") {
                    echo '<p class="error">Le code de vérification a expiré</p>';
                } else if ($_GET['error'] == "invalid_token") { 
                    echo '<p class="error">Le code de vérification est invalide</p>';
                }
            }
        ?>

        <main>
            <div class="login_form">
                <h1>Connexion</h1>
                <span>Utiliser votre compte Veolia</span>

                <div class="login_form_form">
                    <form action="./Src/Controller/User/Login.php" method="POST">
                        <input class="login_form_form_email" type="email" autocomplete="off" spellcheck="false" tabindex="0" aria-label="email" name="email" autocapitalize="sentences" id="email" placeholder="Adresse e-mail"/>

                        <input id="login_form_form_password" type="password" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Motdepasse1" name="password" autocapitalize="sentences" id="password" placeholder="Saisissez votre mot de passe"/>
                        <input class="checkbox_show_password" type="checkbox" onclick="ChangeTypePassword()">
                        <a class="bottom_checkbox_show_password">Afficher le mot de passe</a>

                        <a href="./register_form.php" class="register_account">Créer un compte</a>
                        <a href="./index.php" class="forgot_password">Mot de passe oublié ?</a>
                        <input class="submit_button" type="submit" value="Suivant"> 
                    </form>
                </div>
            </div>
        </main>

        <script>
            function ChangeTypePassword() {
                var password_1 = document.getElementById("login_form_form_password");
                if (password_1.type === "password") {
                    password_1.type = "text";
                } else {
                    password_1.type = "password";
                }
            }
        </script>
        <script src="./Src/assets/script/main.js"></script>
    </body>