<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Football Fantasy</title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/img_style.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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

        <section class="main">
        <div class="container">
        <div id= "heading-box">
            <div class="row">
            
                <div class="col-md-5 col-md-offset-2">
            
                <div class="cl">&nbsp;</div>
                <div class="featured-main heading-box-background">
                    <a href="#"><img id="featured-main-image" src="" alt="" class="img-responsive"/></a>
                    <div class="featured-main-details">
                        <div class="featured-main-details-cnt">
                            <h4><a href="#" id="featured-main-title">Caption 1</a></h4> 
                            <p id="featured-main-description">aa</p>
                        </div>
                    </div>
                </div>
              </div>
              
                <div class="col-md-3">
                    <div class="featured-side-item item1 heading-box-background">
                      <div class="cl">&nbsp;</div>
                      <a href="#" class="left"><img src="css/images/featured-side-1.jpg" alt="" class="img-responsive"/></a>
                      <br/>
                      <h3><a href="#">Lorem ipsum dolor sit ame</a></h3>
                      <div class="cl">&nbsp;</div>
                    </div> 
                    <div class="featured-side-item item2 heading-box-background">
                      <div class="cl">&nbsp;</div>
                      <a href="#" class="left"><img src="css/images/featured-side-2.jpg" alt="" class="img-responsive"/></a>
                      <br/>
                      <h3><a href="#">Lorem ipsum dolor sit ame</a></h3>

                      <div class="cl">&nbsp;</div>
                    </div>
   
                    <div class="featured-side-item item3 heading-box-background">
                      <div class="cl">&nbsp;</div>
                      <a href="#" class="left"><img src="css/images/featured-side-3.jpg" alt="" class="img-responsive"/></a>
                      <br/>
                      <h3><a href="#">Lorem ipsum dolor sit ame</a></h3>
                      <div class="cl">&nbsp;</div>
                    </div>

                    <div class="featured-side-item item4 heading-box-background">
                      <div class="cl">&nbsp;</div>
                      <a href="#" class="left"><img src="css/images/featured-side-4.jpg" alt="" class="img-responsive"/></a>
                      <br/>
                      <h3><a href="#">Lorem ipsum dolor sit ame</a></h3>
                      <div class="cl">&nbsp;</div>
                    </div>
                </div>
        
         </div>
    
            </div>
        </div>
        </section>
        


    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Fantasy Football
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default sidebarnews">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> News Spot</h4>
                    </div>
                    <div class="panel-body">
                        <ul id="news">
                        </ul>
                        <a href="#" class="archives">News Archives</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                        <div class="panel panel-default filterable">
                            <div class="panel-heading">
                            <h4> Active Leagues</h4>
                            </div>
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th class ="table-head"> Contest </th>
                                        <th class ="table-head"> Entries </th>
                                        <th class ="table-head"> Entry Fee </th>
                                        <th class ="table-head"> Total Prizes </th>
                                        <th class ="table-head"> Live In </th>
                                <tbody>
                                    <tr>
                                        <td class ="table-text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <br/>
                                            <a href="draft.php" class="watch-now">Join Now</a>
                                        </td>
                                        <td class ="table-text">2/10</td>
                                        <td class ="table-text">$5000</td>
                                        <td class ="table-text">$1,000,000</td>
                                        <td class ="table-text">Sun 3:05p</td>
                                    </tr>
                                    <tr>
                                        <td class ="table-text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <br/>
                                            <a href="draft.php" class="watch-now">Join Now</a>
                                        </td>
                                        <td class ="table-text">2/10</td>
                                        <td class ="table-text">$5000</td>
                                        <td class ="table-text">$1,000,000</td>
                                        <td class ="table-text">Sun 3:05p</td>
                                    </tr>
                                    <tr>
                                       <td class ="table-text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                            <br/>
                                            <a href="draft.php" class="watch-now">Join Now</a>
                                        </td>
                                        <td class ="table-text">2/10</td>
                                        <td class ="table-text">$5000</td>
                                        <td class ="table-text">$1,000,000</td>
                                        <td class ="table-text">Sun 3:05p</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
            
            </div>
        <!-- /.row -->
        </div>
    </div>

    <?php include 'footer.php'; ?>
        

        <!-- Footer -->
        
    <!-- /.container -->
    
    
    </body>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </script>

    <script src="js/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
        $.get("loadhome.php", function( data ) {
          var JSONObject = JSON.parse(data);
          $("#featured-main-image").attr("src", JSONObject[0]['image']);
          $("#featured-main-title").html("" + JSONObject[0]['title']);
          $("#featured-main-description").text("" + JSONObject[0]['description']);
          for(i = 1; i < 5; i++){
            $(".item" + i).find("h3").html("" + JSONObject[i+1]['title']);
            $(".item" + i).find("img").attr("src", JSONObject[i+1]['image']);
          }
        });

        $.get("http://api.fantasy.nfl.com/v1/players/news?format=json", function(data){
          for(i = 0; i < 6; i++){
            var headline = data['news'][i]['headline'];
            var date = data['news'][i]['timestamp'];
            $("#news").append("<li><small class='date'>" + date + "</small>" +
                               "<p>" + headline + "</p></li>");

          }
        });
      });
    </script>




</html>
