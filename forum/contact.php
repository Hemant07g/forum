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
    <style>
        .container{
    min-height: 87.8vh;
}
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <div class="container">
        
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $username = $_POST['username']; 
        $email = $_POST['email']; 
        $feedback = $_POST['feedback']; 
        $sql = "INSERT INTO `contact` ( `username`, `email`, `feedback`) VALUES ('$username', '$email', '$feedback')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your form has been submitted!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
        <h1 class="py-2">Contact Us</h1> 
        <form action= "'. $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" name="username" placeholder="username">
    </div>
    <div class="col">
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
  </div>
                <label for="exampleFormControlTextarea1">Give your Feedback</label>
                <textarea class="form-control" id="comment" name="feedback" rows="3"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>
            <button type="submit" class="btn btn-success">Post </button>
        </form> 
    </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Start discussion</h1> 
           <p class="lead">You are not logged in. Please login to contact us.</p>
        </div>
        ';
    }

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