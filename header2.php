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
                <a class="navbar-brand" href="index.html">Fantasy Football</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 navright">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>


                    
                    <?php if(isset($_SESSION['email'])){
                        echo "<li>";
                        echo "<h3 style='letter-spacing: 1px;color:#70A209;text-shadow:1px 1px #282C34;'>Logged in as</h3>";
                        echo "<h4 style='color:#282C34;'>".$_SESSION['email']."</h4>";
                        echo "</li>";
                        echo "<li>";
                        echo "<a href='logout.php' class='signup'>Logout</a>";
                        echo "</li>";
                    } else {
                        echo "<li>";
                        echo '<a href="loginpage.php" class="login">Login</a>';
                        echo "</li>";
                        echo "<li>";
                        echo '<a href="#" class="signup">Signup</a>';
                        echo "</li>";
                    }
                          
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>