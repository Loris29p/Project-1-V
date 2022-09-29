<?php
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/SGBD/SGBD.class.php');
    require_once('./Config/Config.php');

    session_start();
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/account_parameters.css"> 
        <script src="./Src/assets/scripts/config.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

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

        <?php 
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="error">Remplissez au minimum un champ</p>';
                }
            }
        ?>

        <main>
            <div class="account_parameters_form">
                <h1>Modifier votre compte</h1>

                <div class="account_parameters_form_form">
                    <form action="./Src/Controller/User/Changeinfo.php" method="POST">
                        <input class="account_parameters_form_form_firstname" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Prénom" name="first_name" autocapitalize="sentences" id="first_name" pattern="[A-Za-z]*" placeholder="<?php echo $_SESSION['first_name']; ?>"/>
                        <input class="account_parameters_form_form_lastname" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="last_name" autocapitalize="sentences" id="last_name" pattern="[A-Za-z]*" placeholder="<?php echo $_SESSION['last_name']; ?>"/>

                        <input class="account_parameters_form_form_email" type="email" autocomplete="off" spellcheck="false" tabindex="0" aria-label="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocapitalize="sentences" id="email" placeholder="<?php echo $_SESSION['email']; ?>"/>
                        <a class="bottom_account_parameters_form_form_email">Vous pouvez utiliser des lettres, des chiffres et des points</a>

                        <input class="submit_button" type="submit" value="Suivant"> 
                    </form>
                </div>

                <img class="account_parameters_img_right" src="./Src/assets/img/google/account.svg">
            </div>
        </main>
        
        <script src="./Src/assets/scripts/main.js"></script>
    </body>