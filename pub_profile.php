<!--  -->
<?php
session_start();
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn= db_connect();
$id = $_SESSION['publisherid'];
//  echo $id;
$selected = "select * from publisher where publisherid = $id";
// echo $selected;
$result = mysqli_query($conn,$selected);
$row = mysqli_fetch_array($result);
// var_dump($row);
$book="select * from books where publisherid =$id ";
$bookselected = mysqli_query($conn,$book);
$selectedbook = mysqli_fetch_array($bookselected);
 
if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}
if(isset($image)){
    $selected .= ", image='$image' WHERE publisherid = '$id'";
} else {
    $selected .= " WHERE publisherid = '$id'";
}
 
 ?>




<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="./bootstrap/css/containerr.css" rel="stylesheet">
</head>
<!------ Include the above in your HEAD tag ---------->
<?php if ($row['image']==""){?>
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <?php }else{?>
                                    <div class="m-b-25"> <img src="<?php echo './bootstrap/img/'. $row['image'] ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                    <?php }?>
<div class="containerr">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-11 col-lg-11 ">
            <div class="box ">
                <div class="box-icon">
                    
                    <span class="fa fa-4x fa-log-in"><img src="./bootstrap/img/5983634.png" alt="image profile" style="width: 70px ;height:70px; "></span>
                </div>
                <div class="info">
                    <form class="text-center" action="pub_profile.php" method="post" enctype="multipart/form-data">
                    <h4 class="text-center">
                    <input class="text-center" type="text" name="publisher_name" value="<?php echo $row['publisher_name'];?>" >
                    </h4>
                    <p> <?php echo $row['publisher_name'];?> is the New York Times bestselling author of They Both Die at the End, More Happy Than Not, and History Is All You Left Me and—together with Becky Albertalli—coauthor of What If It’s Us. He was named a Publishers Weekly Flying Start. Adam was born and raised in the Bronx. He was a bookseller before shifting to children’s publishing and has worked at a literary development company and a creative writing website for teens and as a book reviewer of children’s and young adult novels. He is tall for no reason and lives in Los Angeles</p>
                    <a href="book.php?bookisbn=<?php echo $selectedbook['book_isbn'];?>" class="btn btn-success">Link for books</a>
                    
                    <table class="table">
                    <tr>
				        <th>ISBN</th>
				        <td><input type="text" name="isbn" value="<?php echo $selectedbook['book_isbn'];?>" ></td>
		            </tr>
                    <tr>
				        <th>Title</th>
				        <td><input type="text" name="title " value="<?php echo $selectedbook['book_title'];?>" ></td>
		            </tr>
                    <tr>
				        <th>Publisher</th>
				        <td><input type="text" name="publisher " value="<?php echo $row['publisher_name'];?>" ></td>
		            </tr>
                    <tr>
				        <th>Author</th>
				        <td><input type="text" name="author " value="<?php echo $selectedbook['book_author'];?>" ></td>
		            </tr>
                    <tr>
				        <th>Description</th>
				        <td><input type="text" name="description " value="<?php echo $selectedbook['book_descr'];?>" ></td>
		            </tr>
                    <tr>
				        <th>Description</th>
				        <td><input type="text" name="image " value="<?php echo $selectedbook['book_image'];?>" ></td>
		            </tr>
                    </table>
                    </form>
                </div>
            </div>  
        </div>
        <div class="row">

        <a href="edit_profile.php" class="btn btn-danger">Edit profile</a>
        </div>   
        
        
	</div>
</div>
<?php
	
	require "./template/footer.php";
?>