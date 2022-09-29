<?php 
    require_once("./Src/Controller/User/User.php");
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
        <link rel="stylesheet" href="./Src/assets/css/admin.css">
        <link rel="stylesheet" href="./Src/assets/css/navbar.css">
        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <link rel="stylesheet" href="./Src/assets/css/main.css"> 
        <script src="./Src/assets/script/config.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        </header>


        <div class="navigation_size">
            <div class="navigation">
                <ul>
                    <li class="list" data-color="#85A1F2">
                        <a href="#main_page">
                            <span class="icon">
                                <i class="fad fa-lock"></i>
                            </span>
                            <span class="title">Administration</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                        <a href="#second_page">
                            <span class="icon"><i class="fad fa-users-cog"></i></span>
                            <span class="title">Utilisateurs</span>
                        </a>
                    </li>
                    <!-- <li class="list" data-color="#F7DA63">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-message"></i></span>
                            <span class="title">Message</span>
                        </a>
                    </li>
                    <li class="list" data-color="#559E55">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-circle-question"></i></span>
                            <span class="title">Help</span>
                        </a>
                    </li>
                    <li class="list" data-color="#CCA8E0">
                        <a href="#">
                            <span class="icon"><i class="fa-solid fa-gear"></i></span>
                            <span class="title">Settings</span>
                        </a>
                    </li> -->
                    <div class="indicator"></div>
                </ul>
            </div>
        </div>
    </body>

    <main>
        <div id="main_page">
            <h1>Administration</h1>
            <img class="img_h1" src="./Src/assets/img/symbols/hand.raised.square.on.square.fill.svg">
            <img class="img_center" src="./Src/assets/img/symbols/lock.icloud.fill.svg">
        </div>
        <div id="second_page">
            <h1>Utilisateurs</h1>
            <img class="img_h1" src="./Src/assets/img/symbols/person.2.badge.gearshape.fill.svg">
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
                                    <a class="actions_user" href="./Src/Controller/User/Delete.php?id=<?php echo $user['id']; ?>">
                                        <span class="title">Supprimer</span>
                                        <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.minus.svg" alt="Supprimer">
                                    </a>
                                    <a class="actions_user" href="./Src/Controller/User/Verify.php?id_user=<?php echo $user['id']; ?>">
                                        <span class="title">Vérifier</span>
                                        <img src="./Src/assets/img/symbols/person.crop.circle.fill.badge.checkmark.svg" alt="Vérifier">
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </main>

	<!-- <script>
		let list = document.querySelectorAll('li');
		for (let i=0; i<list.length; i++){
            // console.log(list[i].className)
            if (list[i].className == "list active" || list[i].className == "list") {
                console.log(list[i].className)
                list[i].onmouseover = function(){
                    let j = 0;
                    while (j < list.length){
                        list[j++].className = 'list';
                    }
                    console.log(list[i].className, "onmouseover")
                    list[i].className = 'list active';
                }
            }
		}
	</script> -->
    <script src="./Src/assets/script/main.js"></script>
</html>