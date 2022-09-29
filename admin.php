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
                    <li class="list active" data-color="#85A1F2">
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
                    <li class="list" data-color="#F7DA63">
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
                    </li>
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

            <div class="table_users">
            <?php 
                foreach ($users as $user) {
                    ?>
                    <table class="table_users_struct">
                        <tr>
                            <th>ID</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Role</th>
                            <th>Date de création</th>
                            <th>Dernière modifications</th>
                            <th>Vérifier</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['first_name']; ?></td>
                            <td><?php echo $user['last_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td><?php echo $user['created_at']; ?></td>
                            <td><?php echo $user['modified_at']; ?></td>
                            <td><?php echo $user['verified']; ?></td>
                            <td>
                                <i class="fad fa-edit"></i>
                                <i class="fad fa-trash-alt"></i>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
            ?>
            </div>
        </div>
    </main>

	<script>
		let list = document.querySelectorAll('li');
		for (let i=0; i<list.length; i++){
			list[i].onmouseover = function(){
				let j = 0;
				while (j < list.length){
					list[j++].className = 'list';
				}
				list[i].className = 'list active';
			}
		}
	</script>
    <script src="./Src/assets/script/main.js"></script>
</html>