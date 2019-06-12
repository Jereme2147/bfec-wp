<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
    <title>Brusy Fork Environment Consulting, inc.</title>
</head>
<body>
    <nav>
        <div class="mobile-nav" id="mobile-nav"> 
            <div id="mobile-nav-title">
               <a href="./"><h1>Brushy Fork Environmental Consulting, Inc.</h1></a>
            </div>
            <div class="icon">
                <div class="hamburger">
                </div>
            </div>
            <div class="mobile-menu-open" id="mobile-menu-open">
                    <ul>
                        <a href="./"><li>Home</li></a>
                        <a href="./about.php"><li>About</li></a>
                        <a href="./portfolio.php"><li>Portfolio</li></a>
                        <a href="#"><li>News</li></a>
                        <a href="#"><li>Contact</li></a>
                    </ul>
            </div>
        </div>
        <div id="desktop-nav">
            <div id="desktop-title-menu">
                <div id="desktop-title">
                   <a href="./"><h1>Brushy Fork Environmental Consulting, Inc.</h1></a>
                </div>
                <div id="desktop-menu">
                    <ul>
                        <a href="./about.php">
                            <li>About</li>
                        </a>
                        <a href="./portfolio.php">
                            <li>Portfolio</li>
                        </a>
                        <a href="#">
                            <li>News</li>
                        </a>
                        <a href="#">
                            <li>Contact</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div id="deskt"op-logo">
                <img src= "<?php echo get_template_directory_uri();?>/img/logo.png" alt="">
            </div>
        </div>
    </nav>
    <main>