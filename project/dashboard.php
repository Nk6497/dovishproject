<?php 
 
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="dashboard-container">
            <h1>Dashboard</h1>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="dashboard-container">
            <ul>   
                <?php if ($_SESSION['role'] == 'admins') { ?>      
                
                    <li><a href="#" onclick="loadPage('admin_panel.php')">Customers</a></li>
                    <li><a href="#" onclick="loadPage('create_vendor.php')">Vendors</a></li>
                    <li><a href="#" onclick="loadPage('approve_transaction.php')">Approve Transaction</a></li>
                    <li><a href="#" onclick="loadPage('vendor_list.php')">Vendor List</a></li>
                    <li><a href="#" onclick="loadPage('customer_list.php')">Customer List</a></li>
                    <li><a href="logout.php">Logout</a></li>
            
                <?php } if ($_SESSION['role'] == 'customers') { ?>
                
                    <li><a href="#" onclick="loadPage('use_limit.php')">Use Limit</a></li>
                
                <?php } ?>
            </ul>
        </div>
    </aside>

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
