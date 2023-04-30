<?php
session_start();


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

           
                                  <!---form Start--->

                                 <div class="card col-lg-4 mx-auto mt-5">
                                     <div class="card-header text-center py-2 bg-dark text-light">  Post the data </div>

                                     <div class="card body">
                                  <form action="./controller/Addpost.php" method="GET">

                                 <!--- TITLE---> 
                                                    
          <input value="<?php echo isset($_SESSION['old']['title']) ? 
        $_SESSION['old']['title'] : '' ?>"
        name="title" class="form-control mt-3"  type="text" 
        placeholder="Title">
        <?php
        if (isset($_SESSION['form_errors']['title_error'])) {
          ?>
          <span><?= $_SESSION['form_errors']['title_error']?></span>
          <?php
        }
        ?>
                                                                     <!--- DETAIL--->  
                                                                                                                                   
        <textarea name="detail" class="form-control mt-3"  
        placeholder="Detail of Subjects"><?= isset($_SESSION['old']['detail']) ? $_SESSION['old']['detail'] : ''  ?></textarea>
        <?php
        if (isset($_SESSION['form_errors']['detail_error'])) {
          ?>
          <span><?= $_SESSION['form_errors']['detail_error']?></span>
          <?php
        }
        ?>
                                 <!--- AUTHOR--> 

        <input value='<?php echo isset($_SESSION['old']['author']) ? $_SESSION['old']['author'] : '' ?>' name="author" class="form-control mt-3"  type="text" 
        placeholder="Author of Subjects">
        
        <button class="btn btn-success mt-3 rounded-0 w-100">Start Searching</button>
        </form>
        </div>
</div>
                                </div>
                                   <!---form end--->

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
</div>
  
                                  </body>
</html>

<?php
session_unset(); 
?>
