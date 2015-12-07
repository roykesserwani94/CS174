 <link href="css/navbar.css" rel="stylesheet">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header navbar-custom ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Fantasy Football</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 navright">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="leagues.php">Leagues</a>
                    </li>
                    
                    <?php if(isset($_SESSION['email'])){
                        $result = mysql_query("SELECT balance FROM profile");
                        echo "<li>";
                        echo "<a>Account Balance: ".$result['balance']."</a>";
                        echo "</li>";
                        //login
                        echo "<li>";
                        echo "<a>Logged in as: ".$_SESSION['email']."</a>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='logout.php' class='signup'>Logout</a>";
                        echo "</li>";
                    } else {
                        echo "<li>";
                        echo '<a href ="#">Login to view balance.</a>';
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='loginpage.php'>Login</a>";
                        echo "</li>";
                        echo "<li>";
                        echo '<a href="loginpage.php" class="signup">Signup</a>';
                        echo "</li>";
                    }
                          
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>