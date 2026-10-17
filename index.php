<?php
    $pg_title = 'Home Page';
    $pg_class = 'home';
    $pg_desc = 'land here for the moment';
    $pg_keywords = 'login, signin, create account';

    require_once 'includes/header.php';
    // require_once 'includes/config.php';
    // require_once ('/login.php');
    // include ('session.php');
    // $error = "";
?>
<!-- <div id="main">
    <h4>PHP Login Session Example</h4>
    <div id="login">
        <h4>Login Form</h4>
        <form action="" method="post">
            <label>UserName: </label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password: </label>
            <input id="password" name="password" placeholder="**********" type="password" autocomplete="">
            <input name="submit" type="submit" value="Login">
            <span><php echo $error; ?></span>
        </form>
    </div>
</div> -->

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<a href="login.php" target="_self">Login</a>
		</div>
	</div>

<?php require_once 'includes/footer.php' ?>
<script type="text/javascript" src="assets/js/loginSelection.js"></script>

