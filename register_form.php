<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/register.css">
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
                } else if ($_GET['error'] == "account_exists") {
                    echo '<p class="error">Compte déjà existant</p>';
                }
            }
        ?>

        <main>
            <div class="register_form">
                <h1>Créer votre compte Veolia</h1>
                <span>Accéder à Veolia</span>

                <div class="register_form_form">
                    <form action="./Src/Controller/User/Register.php" method="POST">
                        <input class="register_form_form_firstname" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Prénom" name="first_name" autocapitalize="sentences" id="first_name" placeholder="Prénom"/>
                        <input class="register_form_form_lastname" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="last_name" autocapitalize="sentences" id="last_name" placeholder="Nom"/>

                        <input class="register_form_form_email" type="email" autocomplete="off" spellcheck="false" tabindex="0" aria-label="email" name="email" autocapitalize="sentences" id="email" placeholder="Adresse e-mail"/>
                        <a class="bottom_register_form_form_email">Vous pouvez utiliser des lettres, des chiffres et des points</a>

                        <input id="register_form_form_password" type="password" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Motdepasse1" name="password" autocapitalize="sentences" id="password" placeholder="Mot de passe"/>
                        <input id="register_form_form_password_verif" type="password" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Motdepasse2" name="password_verif" autocapitalize="sentences" id="password_verif" placeholder="Confirmer"/>
                        <a class="bottom_register_form_form_password">Utilisez au moins huit caractères avec des lettres, des chiffres et des symboles</a>
                        <input class="checkbox_show_password" type="checkbox" onclick="ChangeTypePassword()">
                        <a class="bottom_checkbox_show_password">Afficher le mot de passe</a>

                        <a href="./login_form.php" class="connect_exist_account">Se connecter à un compte existant</a>
                        <input class="submit_button" type="submit" value="Suivant"> 
                    </form>
                </div>

                <img class="register_img_right" src="./Src/assets/img/account.svg">
            </div>
        </main>

        <script>
            function ChangeTypePassword() {
                var password_1 = document.getElementById("register_form_form_password");
                var password_2 = document.getElementById("register_form_form_password_verif");
                if (password_1.type === "password") {
                    password_1.type = "text";
                    password_2.type = "text";
                } else {
                    password_1.type = "password";
                    password_2.type = "password";
                }
            }
        </script>
        <script src="./Src/assets/script/main.js"></script>
    </body>