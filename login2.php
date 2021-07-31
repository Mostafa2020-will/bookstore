<?php
	$title = "publishers login";
	require_once "./template/header.php";
?>


<form action="login.php" method="post" class="form-horizontal">
    <fielset>
        <legend>Log In</legend>
        
        <div class="form-group" >
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-5">
                <input type="text" name="publisher_name" id="username" placeholder="Username" class="form-control">
            </div>
        </div>
        <div class="form-group" >
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
                <input type="password" name="pubpass" id="password" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </div>
        </div>
    </fielset>
</form>
<?php
	require_once "./template/footer.php";
?>