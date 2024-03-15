<?php 
 
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <!-- Header and Sidebar -->
    
    <?php

        include_once('header.php');
        include('sidebar.php');

    ?>

    <!-- Content Area -->
    <main class="content">
        <div class="container" id="content">
            <!-- Content will be dynamically loaded here -->
        </div>
    </main>
    <script>
        function loadPage(page) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", page, true);
            xhttp.send();
        }
    </script>
</body>
</html>
