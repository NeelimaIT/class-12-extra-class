<?php
session_start();
include '../env.php';

//*input collect
$title=$_REQUEST['title']; 
$detail=$_REQUEST['detail']; 
$author=$_REQUEST['author']; 

$errors=[];

//*validation rules



 if(empty($title)){
    $errors['title_error']="No Title?";
 }elseif(strlen($title)>=50){
    $errors['title_error']="No more title";
 }

 if(empty($detail)){
    $errors['detail_error']="No detail";
 }


if(count($errors)>0){
    //*redirect back
    $_SESSION['form_errors']=$errors;
    $_SESSION['old']=$_REQUEST;
    header("Location:../Post.php");
}
    else{
       //*move forward
       $query="INSERT INTO   posts  (title,detail, author) VALUES ('$title','$detail','$author')";
       
       $response=mysqli_query($conn,$query);
       
       if($response){
         $_SESSION['msg']='Your post have been submitted';
         header("location:../Post.php");
       }
  
    
      }




?>