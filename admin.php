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
    
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

</head>
<body onload="checkMessages()">

    <!-- funkcje do zwracania danych z bazy -->     
    <?php

    session_start(); 

     if($_SESSION['isLogged'] == false){
         header('location:http://localhost/project/#login');
     } //odkomentować po skończeniu

    $conn = new mysqli('localhost', 'root', '', 'portfolioproject');

    if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
    }


    $sql = "SELECT COUNT('Id_wiadomosci') from messages where 'czy_wyswietlono' = 0";

    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);

    $unreadedMessages = $row[0];
    
    $login = $_SESSION['login'];
    

    function getUserPrivileges(){
        $login = $GLOBALS['login'];
        $sql = "SELECT privileges_Id from users where login = '$login'";

        $conn = $GLOBALS['conn'];

        $result = $conn -> query($sql);
        $row = mysqli_fetch_array($result);

        $privileges = $row[0];

        echo $privileges;
        
    }

    function returnNumberOfMessages(){

        echo $GLOBALS["unreadedMessages"];

    }
     
    function returnNumberOfProjects(){
        echo '111';
    }   //na takiej zasadzie funkcja odbierała z głównego skryptu dane do połączenia z bazą i w ten sposób będą dane wyświetlanie w divie

    function returnNumberOfComments(){
        echo '21';
    }
    function returnNumberOfUsers(){
        echo '12';
    }
   
    ?>
 
    <!-- tutaj strona --> 

    <div class="header-admin">

        <h1>Content managment system</h1>

    </div>
    <div class="bottom-admin">

        <div class="left-admin">

            <div class="navbar-admin">
                
                    <ul>
                        <a href="#dashboard" class="menu-admin" onclick="dashboardTab()" id="dashboardLink"><li class="list-admin"><span class="material-symbols-outlined icons">dashboard</span>Dashboard</li></a>
                        <a href="#projects" class="menu-admin" onclick="projectsTab()" id="projectsLink"><li class="list-admin"><span class="material-symbols-outlined icons">terminal</span>Projects</li></a>
                        <a href="#users" class="menu-admin" onclick="usersTab()" id="userLink"><li class="list-admin"><span class="material-symbols-outlined icons">group</span>Users</li></a>
                        <a href="#messages" class="menu-admin" onclick="messagesTab()" id="messagesLink"><li class="list-admin"><span class="material-symbols-outlined icons" id="messages-icon">mark_email_unread</span>Messages</li></a><!--mail-->
                        <a href="#logout" class="menu-admin last-admin" onclick="logout()"><li class="list-admin "><span class="material-symbols-outlined icons">logout</span>Logout</li></a>
                    </ul>


            </div>
        </div>
        <div class="right-admin">

            <div class="content-admin" id="content-admin">

                <div id="1" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar1"><p><?php returnNumberOfUsers() ?></p></div>
                </div>

                <div id="2" class="content-divs">
                <h1>Number of comments</h1>
                <div class="progress-bar2"><p><?php returnNumberOfComments() ?></p></div>
                </div>

                <div id="3" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar3"><p><?php returnNumberOfProjects() ?></p></div>
                </div>

                 

            </div>

        </div>


    </div>


    <script type="text/babel">

        const checkMessages = () =>{

            let numberOfMessages = <?php returnNumberOfMessages() ?>;

        if(numberOfMessages!=0){
            document.getElementById('messages-icon').innerText = 'mark_email_unread';
            }
        else{
            document.getElementById('messages-icon').innerText = 'mail';
            }

            displayMenu();

        }

        const displayMenu = () => {

            let privilegesLevel = "<?php getUserPrivileges()?>";

            switch (privilegesLevel) {

                case "1":
                    
                    document.getElementById('dashboardLink').style.display= "none";
                    document.getElementById('projectsLink').style.display= "none";
                    document.getElementById('userLink').style.display= "none";
                    document.getElementById('messages-icon').innerText = 'mail';

                    break;
                case "2":
                    
                    document.getElementById('dashboardLink').style.display= "none";
                    document.getElementById('projectsLink').style.display= "none";
   
                default:
                    break;
            }

        }

        const dashboardTab = () => {
            
            document.getElementById("content-admin").innerHTML = "";

            const contentJSX = (

                <>
                <div id="1" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar1"><p><?php returnNumberOfUsers() ?></p></div>
                </div>

                <div id="2" class="content-divs">
                <h1>Number of comments</h1>
                <div class="progress-bar2"><p><?php returnNumberOfComments() ?></p></div>
                </div>

                <div id="3" class="content-divs">
                <h1>Number of projects</h1>
                <div class="progress-bar3"><p><?php returnNumberOfProjects() ?></p></div>
                </div>
                </>
            );

            const Dashboard = () => {

                return contentJSX;

             }

            const container = document.getElementById('content-admin');
            const root = ReactDOM.createRoot(container);
            root.render(<Dashboard />);

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