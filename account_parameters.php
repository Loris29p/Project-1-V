<?php
    require_once('./Src/Model/functions.php');
    require_once('./Src/Controller/SGBD/sgbd.php');
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
        <script src="./Src/assets/script/config.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <header>
            <div class="navbar_top_right">
                <div id="account_top_right">
                    <img src="./Src/assets/img/RGB_VEOLIA_HD.png" alt=""/>
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
                                    <img src="./Src/assets/img/img_avatar.png" alt="Avatar">
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
                                    <img src="./Src/assets/img/img_avatar.png" alt="Avatar">
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
            <div class="centerxenter">
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Photo de profil</div>
                            <div class="card-body text-center">
                                <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <button class="btn btn-primary" type="button">Valider</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card mb-4">
                            <div class="card-header">Informations générales</div>
                            <div class="card-body">
                                <form action="./Src/Controller/User/Changeinfo.php" method="POST">
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="first_name">Prénom</label>
                                            <input class="form-control" id="first_name" name="first_name" type="text" placeholder="Prénom">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="last_name">Nom</label>
                                            <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="email">Adresse e-mail</label>
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Adresse e-mail">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Valider les changements</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
        
        <script src="./Src/assets/script/main.js"></script>
    </body>