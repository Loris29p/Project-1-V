<?php 
    require_once("./Src/Controller/User/User.class.php");
    require_once("./Src/Controller/Companies/Companies.class.php");
    require_once('./Config/Config.php');
    session_start();

    $user_admin = new User();
    $users = $user_admin->getAllUsers();

    $companies = new Companies();
    $companies_all = $companies->getAll();
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/admin.css">
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <link rel="stylesheet" href="./Src/assets/css/background_animated.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <script src="./Src/assets/scripts/config.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>

    <body>
        
        <?php 
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    ?>
                    <script>
                        alert("Remplissez tous les champs");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_already_exists") {
                    ?>
                    <script>
                        alert("Le logo existe déjà");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_too_large") {
                    ?>
                    <script>
                        alert("Le logo est trop grand");
                    </script>
                    <?php
                } else if ($_GET['error'] == "sqlerror") {
                    ?>
                    <script>
                        alert("Erreur SQL");
                    </script>
                    <?php
                } else if ($_GET['error'] == "company_already_exists") {
                    ?>
                    <script>
                        alert("La compagnie existe déjà");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_not_allowed") {
                    ?>
                    <script>
                        alert("Uniquement les logos de type JPG, JPEG, PNG & GIF sont acceptés");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_upload_error") {
                    ?>
                    <script>
                        alert("Erreur lors de l'upload du logo");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_not_image") {
                    ?>
                    <script>
                        alert("Le logo n'est pas une image");
                    </script>
                    <?php
                } else if ($_GET['error'] == "client_already_exists") {
                    ?>
                    <script>
                        alert("Un client avec le même nom de base de données existe déjà");
                    </script>
                    <?php
                } else if ($_GET['error'] == "logo_too_big") {
                    ?>
                    <script>
                        alert("Merci de choisir un logo de 96x96 pixels");
                    </script>
                    <?php
                } else if ($_GET['error'] == "auto_company_not_valid") {
                    ?>
                    <script>
                        alert("Merci de rentrer 1 ou 0");
                    </script>
                    <?php
                }
            }
        ?>

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
        </header>


        <div class="navigation_size">
            <div class="navigation">
                <ul>
                    <li class="list" data-color="#85A1F2">
                        <a onclick="ShowSpecialPage('first_page')">
                            <img src="./Src/assets/img/symbols/faceid.svg" alt=""/>
                            <span class="title">Administration</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                    <a onclick="ShowSpecialPage('second_page')">
                            <img src="./Src/assets/img/symbols/person.fill.viewfinder.svg" alt=""/>
                            <span class="title">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                    <a onclick="ShowSpecialPage('third_page')">
                            <img src="./Src/assets/img/symbols/text.viewfinder.svg" alt=""/>
                            <span class="title">Clients</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>

        <main>
            <div id="first_page">
                <h1>Administration</h1>
                <img class="img_h1" src="./Src/assets/img/symbols/faceid.svg">
                <!-- <img class="img_center" src="./Src/assets/img/symbols/lock.icloud.fill.svg"> -->
            </div>
            <div id="second_page">
                <h1>Utilisateurs</h1>
                <img class="img_h1" src="./Src/assets/img/symbols/person.fill.viewfinder.svg">
                <div class="table_users">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">ID</div>
                            <div class="col col-2">Prénom</div>
                            <div class="col col-3">Nom</div>
                            <div class="col col-4">Mail</div>
                            <div class="col col-5">Role</div>
                            <div class="col col-6">Date de création</div>
                            <div class="col col-7">Dernière modifications</div>
                            <div class="col col-8">Vérifier</div>
                            <div class="col col-9">Actions</div>
                        </li>
                        <?php 
                            foreach ($users as $user) {
                                ?>
                                <li class="table-row">
                                    <div class="col col-1" data-label="ID"><?php echo $user['id']; ?></div>
                                    <div class="col col-2" data-label="Prénom"><?php echo $user['first_name']; ?></div>
                                    <div class="col col-3" data-label="Nom"><?php echo $user['last_name']; ?></div>
                                    <div class="col col-4" data-label="Mail"><?php echo $user['email']; ?></div>
                                    <div class="col col-5" data-label="Role"><?php echo $user['role']; ?></div>
                                    <div class="col col-6" data-label="Date de création"><?php echo $user['created_at']; ?></div>
                                    <div class="col col-7" data-label="Dernière modifications"><?php echo $user['modified_at']; ?></div>
                                    <div class="col col-8" data-label="Vérifier"><?php echo $user['verified']; ?></div>
                                    <div class="col col-9" data-label="Actions">
                                        <a class="actions_user" href="./Src/Controller/User/Verify.php?id_user=<?php echo $user['id']; ?>">
                                            <span class="title">Vérifier</span>
                                            <img src="./Src/assets/img/symbols/pencil.circle.svg" alt="Vérifier">
                                        </a>
                                        <a class="actions_user" href="./Src/Controller/User/Delete.php?id=<?php echo $user['id']; ?>">
                                            <span class="title">Supprimer</span>
                                            <img src="./Src/assets/img/symbols/trash.circle.svg" alt="Supprimer">
                                        </a>
                                    </div>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div id="third_page">
                <div class="font-bar">
                    <h1>Clients</h1>
                    <img class="img_h1" src="./Src/assets/img/symbols/text.viewfinder.svg">
                    <img class="img_popup_create_clients" src="./Src/assets/img/symbols/plus.square.svg" onclick="OpenPopupCreateClients()">
                </div>
                <div class="table_companies">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">ID</div>
                            <div class="col col-2">Nom</div>
                            <div class="col col-3">Automatique</div>
                            <div class="col col-4">Image</div>
                            <div class="col col-5">Actions</div>
                        </li>
                        <?php 
                            foreach ($companies_all as $company) {
                                ?>
                                <form method="POST" action="./Src/Controller/Companies/Modify.php?id=<?php echo $company['id'] ?>">
                                    <li class="table-row">
                                        <div class="col col-1" data-label="ID" ><?php echo $company['id'] ?></div>
                                        <div class="col col-2" id="name_company" ondblclick="DivToInput('name_company')" data-label="Nom"><?php echo $company['name'] ?></div>
                                        <div class="col col-3" id="auto_company" ondblclick="DivToInput('auto_company')" data-label="Automatique"><?php echo $company['auto'] ?></div>

                                        <!-- <div class="col col-4" id="fucking_div" style="display:none">
                                            <div id="parent-btn-file-modify-company">
                                                <button class="popup_create_clients_form_file_modify_copmany"><img src="./Src/assets/img/symbols/doc.badge.plus.svg" /></button>
                                                <input class="max_width_input_file" type="file" name="logo_company" id="logo_company" />
                                            </div>
                                        </div> -->

                                        <div class="col col-4 image_company_table" data-label="Image">
                                            <img src="./Src/assets/img/companies/<?php echo $company['image'] ?>" alt="">
                                        </div>
                                        <div class="col col-9" data-label="Actions">
                                            <input class="actions_user_img_submit" type="image" name="submit" src="./Src/assets/img/symbols/pencil.circle.svg" alt="Valider les modifications" />
                                            <a class="actions_user" href="./Src/Controller/Companies/Delete.php?id=<?php echo $user['id']; ?>">
                                                <img src="./Src/assets/img/symbols/trash.circle.svg" alt="Supprimer">
                                            </a>
                                        </div>
                                    </li>
                                </form>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </main>

        <!-- PopUp Create Clients -->
        <div id="popup_create_clients">
            <h1>Créer un nouveau client</h1>
            <img class="img_popup_create_clients_close" src="./Src/assets/img/symbols/xmark.square.svg" onclick="OpenPopupCreateClients()">
            <form action="./Src/Controller/Companies/CreateCompany.php" method="POST" enctype="multipart/form-data">
                <div class="left_part_company">
                    <h1>Entreprise:</h1>
                    <input class="popup_create_clients_form_name" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="name_company" autocapitalize="sentences" id="name_company" pattern="[A-Za-z]*" placeholder="Nom de l'entreprise" required/>
                    <div class="parent-btn-file">
                        <button class="popup_create_clients_form_file"><img src="./Src/assets/img/symbols/doc.badge.plus.svg" /></button>
                        <input type="file" name="logo_company" id="logo_company" required/>
                    </div>

                    <!-- <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="6LdZ9j4iAAAAAPxZA4ejAStxNGoRWcw_S-b1uGDI"></div>
                    </div> -->

                    <input class="submit_button" type="submit" value="Suivant"> 
                </div>
                <div class="right_part_admin">
                    <h1>Admin:</h1>
                    <input class="popup_create_clients_form_name" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Prénom" name="first_name" autocapitalize="sentences" id="first_name" pattern="[A-Za-z]*" placeholder="Prénom" required/>
                    <input class="popup_create_clients_form_last_name" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="last_name" autocapitalize="sentences" id="last_name" pattern="[A-Za-z]*" placeholder="Nom" required/>

                    <input class="popup_create_clients_form_email" type="email" autocomplete="off" spellcheck="false" tabindex="0" aria-label="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" autocapitalize="sentences" id="email" placeholder="Adresse e-mail" required/>
                    <a class="bottom_popup_create_clients_email">Vous pouvez utiliser des lettres, des chiffres et des points</a>
                </div>
            </form>
        </div>

        <script>
            // Disable enter for form
            $(document).keypress(
                function(event){
                    if (event.which == '13') {
                    event.preventDefault();
                    }
                }
            );
            
            function ShowSpecialPage(page) {
                if (page == "first_page") {
                    document.getElementById("first_page").style.display = "block";
                    document.getElementById("second_page").style.display = "none";
                    document.getElementById("third_page").style.display = "none";
                } else if (page == "second_page") {
                    document.getElementById("first_page").style.display = "none";
                    document.getElementById("second_page").style.display = "block";
                    document.getElementById("third_page").style.display = "none";
                } else if (page == "third_page") {
                    document.getElementById("first_page").style.display = "none";
                    document.getElementById("second_page").style.display = "none";
                    document.getElementById("third_page").style.display = "block";
                }
            }

            function DivToInput(element) {
                var div = document.getElementById(element);
                var input = document.createElement("input");
                if (element != "image_company") {
                    input.className = div.className + " input";
                    input.type = "text";
                    input.id = div.id;
                    input.name = div.id;
                    input.placeholder = div.innerHTML;
                    div.parentNode.replaceChild(input, div);
                    input.focus();
                } else {
                    div.parentNode.removeChild(div);
                    var parent_btn_file_modify_company = document.getElementById("parent-btn-file-modify-company");
                    parent_btn_file_modify_company.style.display = "block";
                    var fucking_div = document.getElementById("fucking_div");
                    fucking_div.style.display = "block";
                    console.log(document.getElementById("logo_company"))
                }
            }

            function OpenPopupCreateClients() {
                var popup_create_clients = document.getElementById("popup_create_clients");
                if (popup_create_clients.style.opacity == 0) {
                    popup_create_clients.style.opacity = 1;
                    popup_create_clients.style.visibility = "visible";
                    popup_create_clients.style.display = "block";
                } else {
                    popup_create_clients.style.opacity = 0;
                    popup_create_clients.style.visibility = "hidden";
                    popup_create_clients.style.display = "none";
                }
            }
        </script>
        <script src="./Src/assets/scripts/main.js"></script>
    </body>
</html>