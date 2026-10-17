<?php
    // page info
    $pg_title = 'User Page';
    $pg_class = 'user';
    $pg_desc = 'Here is were sub user profile';
    $pg_keywords = 'user, profile';
    // $jumbotronText = 'Welcome there';

    // required
    require_once "classes/Config.php";
    require_once "includes/header.php";
    require_once "classes/User.php";
    require_once "classes/Session.php";
	
    // is the user logged in
	// Session::userLoggedIn(Session::get('userLoggedIn'));
	
	
	Session::startSession();
	
	// get user array
    $user = User::userVariables($conn, Session::get('userLoggedIn'));
	
	
    // $user = User::userVariables($conn, 'johnnydoe');
    // $user = User::userVariables($conn, $userName);

	// var_dump($user);
?>

<div class="row">
    <div class="col-md-12">
        <header id="header">
            <div class="slider">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="https://placehold.co/1200x400">
                        </div>
                        <div class="item">
                            <img src="https://placehold.co/1200x400">
                            <!-- <img src="http://placehold.it/1200x400/20BFA9/ffffff&text=CLEAN %26 SMART"> -->
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div><!--slider-->
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img class="img-responsive" src="https://placehold.co/160x160"></a>
                    <span class="site-name"><b><?php echo $user['username']; ?></b></span>
                    <!-- <span class="site-description">worpress theme developer</span> -->
                    <!-- <button type="button" class="btn btn-default btn-xs" id="logout"><a href="logout.php">Log Out</a></button> -->
                    <!-- <button type="button" class="btn btn-default btn-xs"><a href="user_admin.php">User Admin</a></button> -->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="mainNav" >
                    <ul class="nav main-menu navbar-nav">
                        <li><a href="#"><i class="fa fa-home"></i> HOME</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        
                    </ul>
                    <ul class="nav  navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
               
            </nav>
        </header><!--/#HEADER-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <b id="">First Name: <i><?php echo $user["firstname"]; ?></i></b><br>
        <b id="">Last Name: <i><?php echo $user["lastname"]; ?></i></b><br>
        <b id="">Email: <i><?php echo $user["email"]; ?></i></b><br>
        <!-- <b id="">Username: <i><php echo $username; ?></i></b><br> -->
        <!-- <b id="">Password: <i><php echo $user_password; ?></i></b> -->
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<script type="text/javascript" src="assets/js/editUser.js"></script>
