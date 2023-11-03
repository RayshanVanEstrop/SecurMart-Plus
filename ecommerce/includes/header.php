<!-- Header navigation bar for the website -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Toggle button for small screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Website logo and title -->
            <a class="navbar-brand" href="index.php">SecurMart+</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <!-- If user is logged in, show these links -->
                <?php
                if (isset($_SESSION['email'])) {
                ?>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="settings.php"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
                    <li><a href="orderhistory.php"><span class="glyphicon glyphicon-file"></span> Order History</a></li>
                    <li><a href="logout_script.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php
                } else {
                ?>
                    <!-- If user is not logged in, show these links -->
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="aboutus.php"><span class="glyphicon glyphicon-tasks"></span> About us</a></li>
                    <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span> Contact</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
