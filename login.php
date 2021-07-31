<?php
    
    require_once "./template/header.php";
   
    session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$publisher_name = trim($_POST['publisher_name']);
	$pubpass = trim($_POST['pubpass']);

	if($publisher_name == "" || $pubpass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	$publisher_name= mysqli_real_escape_string($conn, $publisher_name);
	$pubpass = mysqli_real_escape_string($conn, $pubpass);
        
        $query = 'SELECT * FROM publisher
                  WHERE publisher_name = "'.$_POST['publisher_name'].'"
                  AND pubpass = "'.$_POST['pubpass'].'"';
            
                
        $result = mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
    //  echo(mysqli_num_rows($result));
        if(mysqli_num_rows($result) > 0 ){
            $_SESSION['publisherid'] = $row['publisherid'];
            header('Location: index.php');
                echo $row['publisherid'];
        }else{
            $errorMessage = 'Invalid username or password!';
        }
        
        // if ($row = $result->fetch_assoc()) {
          
        //     // $_SESSION['type'] = $row['type'];
            
        //     header('Location: index.php');
        //     exit;}
            
        // else {
        //     $errorMessage = 'Invalid username or password!';
        // }
    
    
    // echo '<section class="col-md-10">';
    // include 'login2.php';
    // echo '</section>';
    
    require_once "./template/footer.php";
?>