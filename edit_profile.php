<?php
session_start();
require_once "./template/header.php";
$title = "Edit profile";
require_once "./functions/database_functions.php";
	$conn = db_connect();
	$selected= "select * from publisher where publisherid = $_SESSION[publisherid]";
	$result1 = mysqli_query($conn,$selected);
	$row=mysqli_fetch_array($result1);
var_dump($row);
var_dump($_POST);
    if(!isset($_POST['save_all'])){
		echo "Something wrong!";
		exit;
	}

	$isbn = trim($_POST['isbn']);
	$title = trim($_POST['title']);
	$author = trim($_POST['author']);
	$descr = trim($_POST['description']);
	$publisher = trim($_POST['publisher_name']);
    
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
		$image = $_FILES['image']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $image;
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
	}

    $findPub = "SELECT * FROM publisher WHERE publisher_name = $publisher";
	$findResult = mysqli_query($conn, $findPub);
	if(!$findResult){
		// insert into publisher table and return id
		$insertPub = "INSERT INTO publisher(publisher_name) VALUES '$publisher'";
		$insertResult = mysqli_query($conn, $insertPub);
		if(!$insertResult){
			echo "Can't add new publisher " . mysqli_error($conn);
			exit;
		}
	}
	// $row=mysqli_fetch_array($findResult);

    $query = "UPDATE books SET  
	book_title = '$title', 
	book_author = '$author', 
	book_descr = '$descr',
    book_isbn =$isbn
	";
	if(isset($image)){
		$query .= ", book_image='$image' WHERE book_isbn = '$isbn'";
	} else {
		$query .= " WHERE book_isbn = '$isbn'";
	}
    $result = mysqli_query($conn, $query);

	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: pub_profile.php?bookisbn=$isbn");
	}
	$row2=mysqli_fetch_array($result);
















?>

<header>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</header>

<div class="container">
<form method="POST" action="#" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row2['book_isbn'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" value="<?php echo $row2['book_title'];?>" required></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" value="<?php echo $row2['book_author'];?>" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row2['book_descr'];?></textarea>
			</tr>
			
			<tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" value="<?php echo getPubName($conn, $row['publisherid']); ?>" required></td>
			</tr>
            <tr>
            <input type="submit" name="save_all" value="Change" class="btn btn-primary">
		    <input type="reset" value="cancel" class="btn btn-default">
            </tr>
		</table>
		
	</form>
	<br/>
	<a href="pub_profile" class="btn btn-success">Confirm</a>
                <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>