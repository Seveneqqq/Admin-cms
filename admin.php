<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Portfolio-CMS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- funkcje do zwracania danych z bazy -->     
    <?php

    session_start(); 

     if($_SESSION['isLogged'] == false){
         header('location:http://localhost/project/#login');
     }

    $x = $_SESSION['login'];
    $cos = $x;

        
    function dzialaD(){
        echo $GLOBALS['cos'];
    }   //na takiej zasadzie funkcja odbierała z głównego skryptu dane do połączenia z bazą i w ten sposób będą dane wyświetlanie w divie

   
    ?>

    
    <!-- tutaj strona --> 

    <div class="header-admin">

        <h1>Content managment system</h1>

    </div>
    <div class="bottom-admin">

        <div class="left-admin">

            <div class="navbar-admin">
                
                    <ul>
                        <a href="#dashboard" class="menu-admin" onclick="dashboardTab()"><li class="list-admin"><span class="material-symbols-outlined icons">dashboard</span>Dashboard</li></a>
                        <a href="#projects" class="menu-admin" onclick="projectsTab()"><li class="list-admin"><span class="material-symbols-outlined icons">terminal</span>Projects</li></a>
                        <a href="#users" class="menu-admin" onclick="usersTab()"><li class="list-admin"><span class="material-symbols-outlined icons">group</span>Users</li></a>
                        <a href="#messages" class="menu-admin" onclick="messagesTab()"><li class="list-admin"><span class="material-symbols-outlined icons">mark_email_unread</span>Messages</li></a><!--mail-->
                        <a href="#logout" class="menu-admin last-admin" onclick="logout()"><li class="list-admin "><span class="material-symbols-outlined icons">logout</span>Logout</li></a>
                    </ul>


            </div>
        </div>
        <div class="right-admin">

            <div class="content-admin" id="content-admin">

                <div id="1" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar"><p>32</p></div>
                </div>

                <div id="2" class="content-divs">
                <h1>Number of comments</h1>
                <div class="progress-bar"><p>32</p></div>
                </div>

                <div id="3" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar"><p>32</p></div>
                </div>

                

                
                

            </div>

        </div>


    </div>


    <script>


        const dashboardTab = () => {
            document.getElementById("content-admin").innerHTML = "";

            

        }
        const projectsTab = () => {
            document.getElementById("content-admin").innerHTML = "";
        }
        const usersTab = () => {
            document.getElementById("content-admin").innerHTML = "";
        }
        const messagesTab = () => {
            document.getElementById("content-admin").innerHTML = "";
        }
        const logout = () => {

            document.getElementById("content-admin").innerHTML = "";
            
            const xhr = new XMLHttpRequest();

            xhr.open("GET", "./logout.php", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };

        xhr.send();
            
        }



    </script>



    <!-- koniec --> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script> 
    
    <script>

        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
        
    </script>

   

</body>
</html>