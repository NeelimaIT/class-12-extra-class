<?php
session_start();
$query="SELECT * FROM posts";
include './env.php';
$response=mysqli_query($conn, $query);
$posts=mysqli_fetch_all($response,1);
//echo "<pre>";
//print_r($posts);
//echo "</pre>";
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> post sys </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
  </head>
  <body>

  <!--NAV-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container" >
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto mb-2 mb-lg-2">
      <li class="iconbar">
        <a class="nav-link active" aria-current="page" href="./Post.php">Add Post</a>
      </li>
      
      
      <li class="iconbar">
        <a class="nav-link active" aria-current="page" href="./allpost.php">All Post</a>
      </li>
    
</ul>
  </div>

</nav>

                                 <!---NAV BAR END--->
                 <!--Table start for All post-->
            <div class="col-lg-8 mx-auto mt-5">    

           <table class="table table-responsive">
            <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Post Detail</th>
                <th> Post Author</th>
                <th>Post Actions</th>
</tr>
<?php
foreach($posts as $key=>$post){
    ?>
    <tr>
    <td><?=++$key ?></td>
    <td> <?=$post['title']?></td>
    <td><?=$post['detail']?></td>
    <td><?=!empty($post['author']) ? $post['author'] : 'USER' ?> </td>
   
    <td>
        View
        Edit
        Delete
</td>
</tr>
<?php
}
?>

</table>
</div>
  
                                  </body>
</html>

                   

                                   <!---Toast show bootstrap msg--->

  <div class="toast show" style="position:absolute;right:50px;bottom:100px" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="mr-auto">Post System</strong>
    <small>1 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    <?=isset($_SESSION['msg'])? $_SESSION['msg'] : '' ?>
  </div>


<?php
session_unset(); 
?>
