<?php 
include("php-scripts/db-connect.php");
include("php-scripts/handle-calendar.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Calendar</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    
    <body>
        <div class="navbar-container clearfix">
           <header class="login-header clearfix">
               <a href=""><img src="images/jp-logo.png" alt="" class="logo"></a>
               <nav class="login">
                   <ul>
                       <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                       <li>|</li>
                       <li><a href="#"> Search <i class="fa fa-search"></i></a></li>
                   </ul>
               </nav>
           </header>
            <nav class="main-nav">
                <div class="mobile">
                    <ul>
                        <li><a href="#"><i class="fa fa-home fa-3x"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-trophy fa-3x"></i>Games</a></li>
                        <li><a href="#"><i class="fa fa-futbol-o fa-3x"></i>Sport</a></li>
                        <li><a href="#"><i class="fa fa-microphone fa-3x"></i>Podcasts</a></li>
                    </ul>
                </div>
                <div class="hidden">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-trophy"></i> Games</a></li>
                        <li><a href="#"><i class="fa fa-futbol-o"></i> Sport</a></li>
                        <li><a href="#"><i class="fa fa-microphone"></i> Podcasts</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <section class="masthead">
            <img src="images/football-masthead-title.jpg" alt="">
        </section>
        
        <div class="body-container clearfix">
            
            <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                <fieldset>
                    <legend>Sports Calendar</legend>
                    <?php  
                        printCalendar();
                    ?>
                    <div class="form-box">
                        <input type="submit" name="send" id="send" value="Send">
                    </div>
                </fieldset>
            </form>
      
            <div class="feedback clearfix">
                
                <?php 
                evaluate();
                ?>
            </div>
    
        </div>
        <footer>
           <div class="footer-container clearfix">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-trophy"></i> Games</a></li>
                        <li><a href="#"><i class="fa fa-futbol-o"></i> Sports</a></li>
                    </ul>
                    <ul>
                        <li><a href="#"><i class="fa fa-microphone"></i> Podcasts</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i> Contact</a></li>
                        <li><a href="#"><i class="fa fa-suitcase"></i> Careers</a></li>
                    </ul>
                </nav>
            </div>
            <p> &copy; JP Dynamic Media 2016</p>
        </footer>        
    </body> 
</html>















