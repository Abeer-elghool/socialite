<?php 
    
   include '../helpers/functions.php';
   include '../helpers/db.php';



   if($_SERVER['REQUEST_METHOD'] == "POST"){
       
    // LOGIC ... 

      $title   = CleanInputs(Sanitize($_POST['title'],2));
      $content = CleanInputs($_POST['content']);
      $by      = $_SESSION['User']['id'];





      $Message = [];
      # Check Validation ... 
      if(!Validator($title,1)){
      
        $Message['title'] = "Title Field Required";

      }
      
      if(!Validator($title,2)){
      
        $Message['TitleLength'] = "Title length must be > 3";

      }



      if(!Validator($content,1)){
      
        $Message['content'] = "Content Field Required";

      }
      
      if(!Validator($content,2,10)){
      
        $Message['ContentLength'] = "Content length must be >= 100";

      }



        // CODE ... 
        $imageName     = $_FILES['image']['name'];

        $nameArray = explode('.',$imageName);
        $FileExtension = strtolower($nameArray[1]);
   
     if(!Validator($imageName,1)){
      
      $Message['image'] = "image Field Required";

    }


    if(!Validator($FileExtension,5)){
      
      $Message['imageExtension'] = "Invalid Image Extension";

    }

     if(count($Message) > 0){
       $_SESSION['messages'] = $Message;
             
    }else{





      $tmp_path = $_FILES['image']['tmp_name'];
      // $size     = $_FILES['uploadedFile']['size'];
      // $type     = $_FILES['uploadedFile']['type'];
        

 
       $FinalName = rand().time().'.'.$FileExtension;

       $disFolder = $_SERVER['DOCUMENT_ROOT'].'/socialite/layouts/imgs/';
         
       $disPath  = $disFolder.$FinalName;
 
     if(move_uploaded_file($tmp_path,$disPath))
       {
              
   $content = str_replace("'",'_',$content);


    # DB OPERATION .... 
     $insertSql = "insert into posts (title,subject,image,user_id) values ('$title','$content','$FinalName',$by)";

     $InsertOp  = mysqli_query($con,$insertSql);

   
     if($InsertOp){

          $Message['Result'] = "Data inserted.";
        
     }else{
         $Message['Result']  = "Error Try Again.";

      }

            }else{
               $Message['Result'] = "Error In Uploading";
            }
 

     


      $_SESSION['messages'] = $Message;

      header('Location: index.php');

     }

   }



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
                        
                        <li class="breadcrumb-item active">Add Articale</li>
                        <?php } ?>
                        
                        
                        
                        </ol>

                      

 <div class="container">

 <form  method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  enctype ="multipart/form-data">
 
 <div class="form-group">
    <label for="exampleInput">Title</label>
    <input type="text"  name="title" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
   <textarea name="content" class="form-control" ></textarea>
  </div>

 



  
  <div class="form-group">
    <label for="exampleInputEmail1">Upload Image</label>
    <br>
   <input type="file" name="image"  >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


                       
                </div>
                </main>
               
    
                
<?php 
    include '../footer.php';
?>  

