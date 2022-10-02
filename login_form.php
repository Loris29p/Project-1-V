<?php 
    require_once('./Config/Config.php');
    require_once('./Src/Controller/Companies/Companies.class.php');

    $companies = new Companies();
    $companies_list = $companies->getAll();
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/login.css">
        <link rel="stylesheet" href="./Src/assets/css/background_animated.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>

    <body>

        <div class="area" >
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <div class="error">
            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Remplissez tous les champs</p>';
                    } else if ($_GET['error'] == "wrongpassword") {
                        echo '<p>Mot de passe incorrect</p>';
                    } else if ($_GET['error'] == "nouser") {
                        echo '<p>Utilisateur inexistant</p>';
                    } else if ($_GET['error'] == "account_created") {
                        echo '<p>Un mail vous a été envoyé avec un code de vérification</p>';
                    } else if ($_GET['error'] == "account_not_verified") {
                        echo '<p>Le compte n\'a pas été vérifié</p>';
                    } else if ($_GET['error'] == "account_verified") {
                        echo '<p>Le compte a été vérifié</p>';
                    } else if ($_GET['error'] == "token_expired") {
                        echo '<p>Le code de vérification a expiré</p>';
                    } else if ($_GET['error'] == "invalid_token") { 
                        echo '<p>Le code de vérification est invalide</p>';
                    } else if ($_GET['error'] == "recaptcha") {
                        echo '<p>Veuillez cocher la case "Je ne suis pas un robot"</p>';
                    }
                }
            ?>
        </div>

        <header>
            <div class="navbar_top_right">
                <div id="account_top_right">
                    <img src="./Src/assets/img/companies/<?php echo constant("IMG_COMPANY"); ?>" alt=""/>
                    <i class="fad fa-user-circle"></i>
                </div>
                <a href=javascript:history.go(-1) class="icon_come_back">
                    <i class="fad fa-arrow-circle-left"></i>
                </a>
                <a class="icon-menu2" href="./index.php">
                    <i class="fad fa-home"></i>
                </a>
            </div>

            <div id="navbar-dropdown-account">
                    <div class="message_advert_account">
                        <span class="message_advert_account_first_span">
                            Ce compte est géré par <span class="message_advert_account_first_span_2">veolia.com</span> 
                        </span>
                        <span data-et="14" data-dt="3" class="show_more_account_advert">
                            <a target="_blank" href="https://support.google.com/accounts/answer/181692?hl=fr&authuser=0">
                                En savoir plus
                            </a>
                        </span>
                    </div>
                    <div class="account_details_dropdown">
                        <?php 
                            if (isset($_SESSION['id'])) {
                                ?>
                                <div class="account_details_dropdown_img">
                                    <i class="fad fa-user-circle"></i>
                                </div>
                                <div class="first_last_name_dropdown"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></div>
                                <div class="mail_dropdown"><?php echo $_SESSION['email']; ?></div>
                                <div>
                                    <a href="./account_parameters.php" class="manage_account_dropdown_a">
                                        Gérer votre compte
                                    </a>
                                </div>
                                <div class="logout_dropdown">
                                    <a href="./logout.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            Se déconnecter
                                        </div>
                                    </a>
                                </div>
                                <?php   
                            } else {
                                ?>
                                <div class="account_details_dropdown_img" style="opacity: 0.3;">
                                    <i class="fad fa-user-circle"></i>
                                </div>
                                <div class="first_last_name_dropdown" style="opacity: 0.3;">----- -----</div>
                                <div class="mail_dropdown" style="opacity: 0.3;">-------------------------</div>
                                <div>
                                    <a class="manage_account_dropdown_a" style="opacity: 0.3;">
                                        Gérer votre compte
                                    </a>
                                </div>
                                <div class="logout_dropdown">
                                    <a href="./login_form.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            Se connecter
                                        </div>
                                    </a>
                                    <a href="./register_form.php" class="logout_dropdown_a">
                                        <div class="logout_dropdown_div">
                                            S'enregistrer
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="bottom_account_details_dropdown">
                            <span>
                                <a class="bottom_account_details_dropdown_1" href="https://policies.google.com/terms?hl=fr" target="_blank">
                                    Règles de confidentialité
                                </a>
                            </span>
                            <span class="bottom_account_details_dropdown_2"> • </span>
                            <span>
                                <a class="bottom_account_details_dropdown_3" href="https://policies.google.com/privacy?hl=fr" target="_blank">
                                    Conditions d'utilisation
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="login_form">
                <h1>Connexion à ProjectV</h1>
                <!-- <span>Utiliser votre compte</span> -->

                <div class="login_form_form">
                    <form action="./Src/Controller/User/Login.php" method="POST">
                        <input class="login_form_form_email" type="email" autocomplete="off" spellcheck="false" tabindex="0" aria-label="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocapitalize="sentences" id="email" placeholder="Adresse e-mail"/>

                        <input id="login_form_form_password" type="password" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Motdepasse1" name="password" autocapitalize="sentences" id="password" placeholder="Saisissez votre mot de passe"/>
                        <a href="./index.php" class="forgot_password">Mot de passe oublié ?</a>
                        
                        <div class="form-group-checkbox">
                            <div class="checkbox_show_password">
                                <input type="checkbox" id="checkbox_show_password" name="check" onclick="ChangeTypePassword()">
                                <label for="checkbox_show_password"><span>Afficher le mot de passe</span></label>
                            </div>
                        </div>

                        <div class="show_all_companies">
                            <?php 
                            foreach($companies_list as $company) {
                                ?>
                                <div class="show_all_companies_div">
                                    <input type="radio" id="<?php echo $company['id']; ?>" name="company" value="<?php echo $company['id']; ?>">
                                    <label for="<?php echo $company['id']; ?>"><span><?php echo $company['name']; ?></span></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="captcha">
                            <div class="g-recaptcha" data-sitekey="6LdZ9j4iAAAAAPxZA4ejAStxNGoRWcw_S-b1uGDI"></div>
                        </div>

                        <a href="./register_form.php" class="register_account">Créer un compte</a>
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
        <script src="./Src/assets/scripts/main.js"></script>
    </body>