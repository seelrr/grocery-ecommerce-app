<?php
    include('database.php');
    session_start();

    $cartID = @$_SESSION['cartID'];
    
    $statement = "DELETE FROM cartDetail WHERE cartID='$cartID'";
    $db->exec($statement);

    $query = "SELECT SUM(quantity) FROM cartDetail WHERE cartID='$cartID'";
    $itemCount = $db->query($query);
    $itemCount = $itemCount->fetch();
?>

<html lang="en" id="homeHTML">
    <head>
        <meta charset="UTF-8">
        <title>NED's Grocery</title>
        <link rel="shortcut icon" href="images/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="slider.css">
        <link rel="stylesheet" href="style.css">
        <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body id="homeBody">
    <form method="POST" action="search.php">
            <header>
                <nav id="homeNav">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="account.php">Account</a>
                        <a href="search.php">Search</a>
                        <a href="search.php">Department</a>
                        <a href="checkout.php">Checkout</a>
                        <a href="contact.php">Contact</a>
                    </div>
                    <span id="menuButton" onclick="openNav()">&#9776;</span>
                    <a href="home.php"><img id="logo" src="images/logo.png"></a>
                    <div id="searchForm">
                            <input id="searchBar" type=text placeholder="Search Products" name="search">
                            <button id="searchButton" type=submit><i class="fa fa-search"></i></button>
                    </div>
                    <div id="accountBox">
                       <a id="accountLink" href="account.php"><image id="accountIcon" src="images/accountIcon.png"></image>
                            <?php
                                if (isset($_SESSION['username'])){
                                    echo $_SESSION['username'];
                                }
                                else{
                                    echo "Account";
                                }
                            ?>
                        </a> 
                    </div>
                    <div id="cartBox">
                        <a id="cartLink" href="cart.php"><image id="cartIcon" src="images/shoppingCartIcon.png"></image>Shopping Cart</a>
                        <span id="itemCount">
                            <?php
                                if (!isset($_SESSION['cartID'])){
                                    echo "";
                                }
                                else if ($itemCount['SUM(quantity)'] == NULL){
                                    echo "(0)";
                                }
                                else{
                                    echo "(".$itemCount['SUM(quantity)'].")";
                                } 
                                ?>
                        </span>
                    </div>
                </nav>
            </header>
        </form>
        <main id="homeMain">
            <div id="orderInfo">
                <p>
                    Your order has been successfully placed!<br>
                    ORDER # 111-7670127-6938636
                </p>

                <p>
                    Estimated delivery: 3 business days
                </p>

                <a href="home.php">Return to Home</p>
            </div>
        </main>
        <script src="index.js"></script>  
    </body>
    <footer id="searchFooter">
        <p>&copy; 2020 NED's Grocery</p>
    </footer>
    <script src="index.js"></script>  
</html>