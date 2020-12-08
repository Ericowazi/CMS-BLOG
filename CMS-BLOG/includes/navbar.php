<?php include("header.php"); ?>

<div class="class" style="height: 8px; background: #1ab394"></div>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collaped" data-toggle="collapse" data-target="#navbarmenucollapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color: #1ab394; font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;">
            <span style="color: #dce2e1;"
            class="glyphicon glyphicon-edit"></span>&nbsp;wazi</a>
        </div> <!-- End Navbar-header -->

        <div class="collapse navbar-collapse" id="navbarmenucollapse">
            <ul id="nav" class="nav navbar-nav navbar-right">
                <li> <a href="index.php">Home</a> </li>
                <li class="active"> 
                    <a href="blog.php?Page=1">Blog</a> </li>
                <li> <a href="">About Us</a> </li>
                <li> <a href="">Services</a> </li>
                <li> <a href="">Contact Us</a> </li>
                <li> <a href="">Features</a> </li>
                <form action="search.php" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name=Search placeholder="Search Keyword">
                        
                        <button  type="Submit" class=" btn btn-default pull pull-right searchbtn"> 
                            <span style="color: #1ab394;" class="glyphicon glyphicon-search "></span> 
                        </button>
                    </div>
                </form>
                <li> <a style="color: #0b8871; " href="login.php"> 
                        <span class="glyphicon glyphicon-user"></span> 
                    </a> 
                </li>
            </ul>
        </div>
    </div> <!-- End Container -->
</nav> <!-- End Nav -->
