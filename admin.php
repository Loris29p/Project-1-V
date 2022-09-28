<?php 
    session_start();
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
        <div class="bubbles_placement">
            <div class="container">
                <div class="bubbles">
                    <span style="--i:11"></span>
                    <span style="--i:12"></span>
                    <span style="--i:24"></span>
                    <span style="--i:10"></span>
                    <span style="--i:14"></span>
                    <span style="--i:23"></span>
                    <span style="--i:18"></span>
                    <span style="--i:16"></span>
                    <span style="--i:19"></span>
                    <span style="--i:20"></span>
                    <span style="--i:22"></span>
                    <span style="--i:25"></span>
                    <span style="--i:18"></span>
                    <span style="--i:21"></span>
                    <span style="--i:13"></span>
                    <span style="--i:15"></span>
                    <span style="--i:26"></span>
                    <span style="--i:17"></span>
                    <span style="--i:13"></span>
                    <span style="--i:28"></span>
                    <span style="--i:11"></span>
                    <span style="--i:12"></span>
                    <span style="--i:24"></span>
                    <span style="--i:10"></span>
                    <span style="--i:14"></span>
                    <span style="--i:23"></span>
                    <span style="--i:18"></span>
                    <span style="--i:16"></span>
                    <span style="--i:19"></span>
                    <span style="--i:20"></span>
                    <span style="--i:22"></span>
                    <span style="--i:25"></span>
                    <span style="--i:18"></span>
                    <span style="--i:21"></span>
                    <span style="--i:13"></span>
                    <span style="--i:15"></span>
                    <span style="--i:26"></span>
                    <span style="--i:17"></span>
                    <span style="--i:13"></span>
                    <span style="--i:28"></span>
                </div>
            </div>
        </div>

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
                        <a href="#">
                            <span class="icon">
                                <i class="fad fa-lock"></i>
                            </span>
                            <span class="title">Administration</span>
                        </a>
                    </li>
                    <li class="list" data-color="#BF5250">
                        <a href="#">
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