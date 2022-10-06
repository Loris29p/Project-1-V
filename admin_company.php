<?php 
    require_once("./Src/Controller/User/User.class.php");
    require_once("./Src/Controller/Companies/Companies.class.php");
    require_once("./Src/Controller/Companies/Company.class.php");
    require_once('./Config/Config.php');
    // session_start();

    $user_admin = new User();
    $company = new Company($_SESSION['company_name'], $_SESSION['company_id']);
?>

<html>
    <head>
        <title>AWS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="./node_modules/jquery/dist/jquery.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <link rel="stylesheet" href="./Src/assets/css/admin_company.css">
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
                        <a onclick="ShowSpecialPage('first_page')">
                            <img src="./Src/assets/img/symbols/person.fill.viewfinder.svg" alt=""/>
                            <span class="title">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="list" data-color="#85A1F2">
                        <a onclick="ShowSpecialPage('second_page')">
                            <img src="./Src/assets/img/symbols/text.viewfinder.svg" alt=""/>
                            <span class="title">Comptes</span>
                        </a>
                    </li>
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>

        <main>
            <div id="first_page">
                <h1>Utilisateurs</h1>
                <img class="img_h1" src="./Src/assets/img/symbols/person.fill.viewfinder.svg">
                <img class="img_popup_create_clients" src="./Src/assets/img/symbols/plus.square.svg" onclick="OpenPopupCreateClients()">
                <div class="table_users">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">ID</div>
                            <div class="col col-2">Prénom</div>
                            <div class="col col-3">Nom</div>
                            <div class="col col-4">Mail</div>
                            <div class="col col-5">Permission</div>
                            <div class="col col-6">Date de création</div>
                            <div class="col col-7">Dernière modifications</div>
                            <div class="col col-8">Vérifier</div>
                            <div class="col col-9">Actions</div>
                        </li>
                        <?php 
                            foreach ($company->getUsers() as $user) {
                                ?>
                                <li class="table-row">
                                    <div class="col col-1" data-label="ID"><?php echo $user['id']; ?></div>
                                    <div class="col col-2" data-label="Prénom"><?php echo $user['first_name']; ?></div>
                                    <div class="col col-3" data-label="Nom"><?php echo $user['last_name']; ?></div>
                                    <div class="col col-4" data-label="Mail"><?php echo $user['email']; ?></div>
                                    <div class="col col-5" data-label="Permission"><?php echo $_SESSION['permission']; ?></div>
                                    <div class="col col-6" data-label="Date de création"><?php echo $user['created_at']; ?></div>
                                    <div class="col col-7" data-label="Dernière modifications"><?php echo $user['modified_at']; ?></div>
                                    <div class="col col-8" data-label="Vérifier"><?php echo $user['verified']; ?></div>
                                    <div class="col col-9" data-label="Actions">
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

            <div id="second_page">
                <h1>Comptes</h1>
                <img class="img_h1" src="./Src/assets/img/symbols/text.viewfinder.svg">
                <img class="img_popup_create_account" src="./Src/assets/img/symbols/plus.square.svg" onclick="OpenPopupCreateAccount()">
                <div class="table_users">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-1">ID</div>
                            <div class="col col-2">Nom</div>
                            <div class="col col-3">Date de création</div>
                            <div class="col col-4">Dernière modifications</div>
                            <div class="col col-5">Actions</div>
                        </li>
                        <?php 
                            
                            if (!empty($company->getOrgaAccounts())) {
                                foreach ($company->getOrgaAccounts() as $account) {
                                    ?>
                                    <li class="table-row">
                                        <div class="col col-1" data-label="ID"><?php echo $account['id']; ?></div>
                                        <div class="col col-2" data-label="Nom"><?php echo $account['name']; ?></div>
                                        <div class="col col-3" data-label="Date de création"><?php echo $account['created_at']; ?></div>
                                        <div class="col col-4" data-label="Dernière modifications"><?php echo $account['modified_at']; ?></div>
                                        <div class="col col-5" data-label="Actions">
                                            <a class="actions_user" href="./Src/Controller/User/Delete.php?id=<?php echo $account['id']; ?>">
                                                <span class="title">Supprimer</span>
                                                <img src="./Src/assets/img/symbols/trash.circle.svg" alt="Supprimer">
                                            </a>
                                        </div>
                                    </li>
                                    <?php
                                }
                            } else {
                                ?>
                                <li class="advert_li">
                                    <a>Aucun compte</a>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </main>

        <!-- PopUp Create Compte -->
        <div id="popup_create_account">
            <h1>Créer un nouveau compte</h1>
            <img class="img_popup_create_account_close" src="./Src/assets/img/symbols/xmark.square.svg" onclick="OpenPopupCreateAccount()">
            <form action="./Src/Controller/Companies/CreateAccount.php" method="POST" enctype="multipart/form-data">
                <input class="popup_create_account_form_name" type="text" autocomplete="off" spellcheck="false" tabindex="0" aria-label="Nom" name="first_name" autocapitalize="sentences" id="name" pattern="[A-Za-z\s]*" placeholder="Nom du compte"/>
                <input class="submit_button" type="submit" value="Suivant">
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

            function OpenPopupCreateAccount() {
                var popup_create_account = document.getElementById("popup_create_account");
                if (popup_create_account.style.opacity == 0) {
                    popup_create_account.style.opacity = 1;
                    popup_create_account.style.visibility = "visible";
                    popup_create_account.style.display = "block";
                } else {
                    popup_create_account.style.opacity = 0;
                    popup_create_account.style.visibility = "hidden";
                    popup_create_account.style.display = "none";
                }
            }
        </script>
        <script src="./Src/assets/scripts/main.js"></script>
    </body>
</html>