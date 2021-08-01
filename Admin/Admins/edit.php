<?php 
    
   include '../helpers/functions.php';
   include '../helpers/db.php';

   $id = '';
   if($_SERVER['REQUEST_METHOD'] == "GET"){

    // LOGIC .... 
      $Message = [];
      $id  = Sanitize($_GET['id'],1);
     
       if(!Validator($id,3)){
 
        $Message['id'] = "Invalid ID";
        
        $_SESSION['messages'] = $Message;
       header("Location: index.php");
       }

    }







   if($_SERVER['REQUEST_METHOD'] == "POST"){
       
    // LOGIC ... 

      $name  = CleanInputs($_POST['name']);
      $email = CleanInputs($_POST['email']);
       $phone = $_POST['phone'];
      $id         = Sanitize($_POST['id'],1);


    
      $Message = [];
      # Check Validation ... 
      if(!Validator($name,1)){
      
        $Message['name'] = "Name Field Required";

      }
      
      if(!Validator($name,2)){
      
        $Message['NameLength'] = "Title length must be > 3";

      }


     if(!Validator($email,1)){
      
      $Message['emailRequird'] = "Email Field Required";

    }

    if(!Validator($email,4)){
      
      $Message['email'] = "Invalid Email";

    }



      if(!Validator($id,3)){
          $Message['id'] = "Invalid id";
      }





     if(count($Message) > 0){
       $_SESSION['messages'] = $Message;
             
    }else{

    # DB OPERATION .... 

    $sql = "update users set name='$name' , email= '$email' , phone='$phone'  where id = ".$id;

    $op  = mysqli_query($con,$sql);

    if($op){

         $Message['Result'] = "Data updated.";
       
    }else{
         $Message['Result']  = "Error Try Again.";
     
     }
        $_SESSION['messages'] = $Message;
       
        header('Location: index.php');

     }

   }





   # Fetch Data to id . 
   $sql  = "select * from users where id = ".$id;
   $op   = mysqli_query($con,$sql);
   $FetchedData = mysqli_fetch_assoc($op);









    include '../header.php';
?>
  
  <body class="sb-nav-fixed">
        
    
<?php 
    include '../nav.php';
?>  


        <div id="layoutSidenav">
                  
         
<?php 
    include '../sidNav.php';
?>  





            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">

                        <?php 
                        
    

                            if(isset($_SESSION['messages'])){

                               foreach($_SESSION['messages'] as $key =>  $data){

                                echo '* '.$key.' : '.$data.'<br>';
                               }

                             unset($_SESSION['messages']);
                             }else{
                        ?>
                        
                        <li class="breadcrumb-item active">Add Role</li>
                        <?php } ?>
                        
                        
                        
                        </ol>

                      

 <div class="container">

 <form  method="post"  action="edit.php?id=<?php echo $FetchedData['id'];?>"  enctype ="multipart/form-data">
 
 <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name" value="<?php echo $FetchedData['name'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value="<?php echo $FetchedData['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

 <div class="form-group">
     <label for="inputPhone" class="form-label">Phone</label>
     <input type="tel" name="phone" value="<?php echo $FetchedData['phone'];?>"  class="form-control" id="inputPhone">
 </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword1"> Password</label>
    <input type="password"  name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->

 


   <input type="hidden" name="id" value="<?php echo $FetchedData['id'];?>">
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


                       
                </div>
                </main>
               
    
                
<?php 
    include '../footer.php';
?>  

