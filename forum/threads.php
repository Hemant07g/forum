<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Welcome to my Forum</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id=$_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
    }
    ?>
    <?php
    $showalert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $showalert=true;
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title); 
        
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc); 

        $sno = $_POST['sno']; 
        $sql="INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES (NULL, '$th_title', '$th_desc', '$id', '$sno', '2021-07-13 18:27:32.000000')";
        $result=mysqli_query($conn,$sql);
    }
    if($showalert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Question successfully added.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname ;?> forums</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <ul>
                <li>
                    This is a peer to peer forum for sharing knowledge with each other.No Spam / Advertising /
                    Self-promote
                    in the forums.
                </li>
                <li>
                    Do not post copyright-infringing material.
                </li>
                <li>
                    Do not post “offensive” posts, links or images.
                </li>
                <li>
                    Do not cross post questions.
                </li>
                <li>
                    Remain respectful of other members at all times.
                </li>
            </ul>
                    </div>
    </div>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

        echo '<div class="container">
        <h1 class="py-2">Ask a question</h1>
        <form action="'.$_SERVER["REQUEST_URI"].';" method="post">
        <div class="form-group">
        <label for="problem">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="title"
        placeholder="Enter title">
        </div>
        <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
        <div class="form-group">
        <label for="concern">Elaborate your concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
            
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to post comments.</p>
        </div>
        ';
    }
    ?>
    <div class="container">
        <h1 class="py-2">Browse questions</h1>
        <?php
    $id=$_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
    $result = mysqli_query($conn, $sql);
    $noresult=true;
    while($row = mysqli_fetch_assoc($result)){
        $noresult=false;
        $id=$row['thread_id'];
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $thread_time=$row['timestamp'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of OP
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
    echo '<div class="media my-3  ">
            <img class="mr-3" src="partials/img/userdefault.png" width="40px" height="70px"
                alt="Generic placeholder image">
            <div class="media-body">
            <p class="font-weight-bold my-0">'. $row2['user_email'] .' at '. $thread_time.'</p>
                <h5 class="mt-0"><a class="text-dark" href="thread_ques.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
            </div>
        </div>';
    }
    if($noresult)
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Results Found</p>
      <p class="lead">Be the first person to ask the question.</p>
    </div>
  </div>';
    ?>
    </div>
    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>