<?php 
    require_once("./Src/Controller/User/User.class.php");
    require_once('./Config/Config.php');
    session_start();

    $user_admin = new User();
    $users = $user_admin->getAllUsers();
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
                        <a href="#main_page">
                            <img src="./Src/assets/img/symbols/faceid.svg" alt=""/>
                            <span class="title">Administration</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                        <a href="#second_page">
                            <img src="./Src/assets/img/symbols/person.fill.viewfinder.svg" alt=""/>
                            <span class="title">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                        <a href="#third_page">
                            <img src="./Src/assets/img/symbols/text.viewfinder.svg" alt=""/>
                            <span class="title">Clients</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>

        <main>
            <div id="main_page">
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
                                            <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.checkmark.svg" alt="Vérifier">
                                        </a>
                                        <a class="actions_user" href="./Src/Controller/User/Delete.php?id=<?php echo $user['id']; ?>">
                                            <span class="title">Supprimer</span>
                                            <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.minus.svg" alt="Supprimer">
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
                    <img class="img_popup_create_clients" src="./Src/assets/img/symbols/plus.circle.svg" onclick="OpenPopupCreateClients()">
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
                        <li class="table-row">
                            <div class="col col-1" data-label="ID">1</div>
                            <div class="col col-2" data-label="Nom">Veolia</div>
                            <div class="col col-3" data-label="Automatique">1</div>
                            <div class="col col-4" data-label="Image">veolia.png</div>
                            <div class="col col-9" data-label="Actions">
                                <a class="actions_user" href="./Src/Controller/User/Verify.php?id_user=<?php echo $user['id']; ?>">
                                    <span class="title">Vérifier</span>
                                    <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.checkmark.svg" alt="Vérifier">
                                </a>
                                <a class="actions_user" href="./Src/Controller/User/Delete.php?id=<?php echo $user['id']; ?>">
                                    <span class="title">Supprimer</span>
                                    <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.minus.svg" alt="Supprimer">
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </main>

        <!-- PopUp Create Clients -->
        <div id="popup_create_clients">
            <h1>Créer un nouveau client</h1>
            <form action="./Src/Controller/Companies/CreateCompany.php" method="POST">
                <div class="left_part_company">
                    <h1>Entreprise:</h1>
                    <input class="popup_create_clients_form_name" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="last_name" autocapitalize="sentences" id="last_name" pattern="[A-Za-z]*" placeholder="Nom de l'entreprise" required/>
                    <div class="parent-btn-file">
                        <button class="popup_create_clients_form_file"><img src="./Src/assets/img/symbols/doc.badge.plus.svg" /></button>
                        <input type="file" name="upfile" required/>
                    </div>

                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey="6LdZ9j4iAAAAAPxZA4ejAStxNGoRWcw_S-b1uGDI"></div>
                    </div>

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
            function OpenPopupCreateClients() {
                var popup_create_clients = document.getElementById("popup_create_clients");
                console.log(popup_create_clients)
                if (popup_create_clients.style.opacity == 0) {
                    popup_create_clients.style.opacity = 1;
                    popup_create_clients.style.visibility = "visible";
                    popup_create_clients.style.display = "block";
                } else {
                    popup_create_clients.style.opacity = 0;
                    popup_create_clients.style.visibility = "hidden";
                    popup_create_clients.style.display = "none";
                }

                // document.addEventListener('click', function handleClickOutsideBox(event) {
                //     if (popup_create_clients != null) {
                //         if (!popup_create_clients.contains(event.target)) {
                //             popup_create_clients.style.display = 'none';
                //         }
                //     }
                // });
            }
        </script>
        <script src="./Src/assets/scripts/main.js"></script>
    </body>
</html>