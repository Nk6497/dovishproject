<div class="sections-both">
<div class="left-section" style="width: 20%">
<aside class="sidebar">
        <div class="dashboard-container">
            <ul>   
                <?php if ($_SESSION['role'] == 'admins') { ?>      
                
                    <li><a href="create_vendor.php">Add Vendors</a></li>
                    <li><a href="customer_add.php">Add Customers</a></li>
                    <li><a href="vendor_list.php">Vendor List</a></li>
                    <li><a href="customer_list.php">Customer List</a></li>
                    <li><a href="approve_transaction.php">Approve Transaction</a></li>
                    <li><a href="cancel_transaction.php">Cancel Transaction</a></li>   
                    <li><a href="../logout.php">Logout</a></li>
                   
                <?php } if ($_SESSION['role'] == 'customers') { ?>
                    
                    <li><a href="../Admin/vendor_list.php">Vendor List</a></li>
                    <li><a href="../Customer/use_limit.php">Use Limit</a></li>
                    <li><a href="../Customer/wallet_balance.php">Wallet balance</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                      
                <?php } if ($_SESSION['role'] == 'vendors') { ?>

                    <li><a href="../Vendor/vendor_transaction.php">Vendor Transaction</a></li>
                    <li><a href="../logout.php">Logout</a></li>

                <?php } ?>
            </ul>
        </div>
                </aside>
                </div>
                <div class="right-section" style="width: 80%; margin-left: 270px">

    