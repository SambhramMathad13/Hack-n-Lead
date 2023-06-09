<?php 
        include 'connect.php';
        session_start();        
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
          $party=$_POST['party'];
          $msg=$_POST['msg'];
          $id=$_POST['id'];
          $min=$_POST['m'];
          $hour=$_POST['h'];

          // session_start();
          // // $_SESSION['roomed']=true;
          // $_SESSION['room']=$room;

            $sql="SELECT * FROM `voting` WHERE `parties`='$party'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($res);
            // echo $row;
            if($row==1)
          {
           
            echo"<script type='text/javascript'>
            alert('Party name already taken...');</script>";
            echo ('<script type="text/javascript"> 
              window.location.href="create_party.php"; 
               </script>');
              exit;
          }
          else{
            $v=1;
            date_default_timezone_set("Asia/Calcutta");
            $P_hour=date('H');
            $P_date=date('d');
            $P_min=date('i');

            $e_min=$P_min+$min;
            $e_hour=$P_hour+$hour;
            $e_date=$P_date+$date;
            if($e_min>=60)
            {
                $e_min=$e_min-60;
                $e_hour=$e_hour+1;
            }

            if($e_hour>=24)
            {
                $e_hour=$e_hour-24;
                $e_date=$P_date+1;
            }


            $sql="INSERT INTO `voting` (`email`,`name`,`parties`,`id`, `voted`,`ed`,`eh`,`em`,`msgg`) VALUES ('$email','$name','$party','$id','$v','$e_date','$e_hour','$e_min','$msg')";
            
            $res=mysqli_query($conn,$sql);
            if($res)
            {
              echo "<script type='text/javascript'>alert('Party created successfuly ...');</script>";
              echo ('<script type="text/javascript"> 
            window.location.href="list.php?id='.$id.'";  
               </script>');
              exit;
            } 
          }
        }  
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>create_party</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body
        {
          background: radial-gradient(circle,#24246e,#06051f);
        }
    </style>
  </head>
  <body>


  <div class="container my-5 col-sm-3 col-lg-3  my-5 bg-transperant mt-5 text-white fw-bold border-1  roundedborder  shadow-lg">
    <div class="formm" class="mb-3 my-5 col-12 text-white" style="margin-top:21vh">

   

      <form name="myForm" action="http://localhost/sam/create_party.php" 
         method="post">

        <!-- <div class=" mb-3 my-5 col-12 text-white display-4 fw-bold ">
          Welcome to attendence application 
        </div> -->


        <div class=" my-5 col-12 text-white">
          <label for="exampleInputEmail1" class="form-label pt-1">Create election id</label>
          <input id="id" type="text" class="form-control fw-bold opacity-75 " id="exampleInputEmail1" name="id" aria-describedby="emailHelp" required>
        </div> 

        
        <div class=" my-5 col-12 text-white">
          <label for="exampleInputEmail" class="form-label pt-1">Party name</label>
          <input id="p_name" type="text" class="form-control fw-bold opacity-75 " id="exampleInputEmail" name="party" aria-describedby="emailHelp" required>
        </div> 


        <div class="mb-4 my-5 col-12 text-white">
          <label for="exampleInputEmai" class="form-label pt-3">Description</label>
          <input id="msg" type="text" class="form-control fw-bold opacity-75 " id="exampleInputEmai" name="msg" aria-describedby="emailHelp" required>
        </div> 

        <span class=" my-5 col-4 text-white">
          <label for="exampleInputEmail1" class="form-label pt-1">Duration in hours</label>
          <input id="h" type="text" class="form-control fw-bold opacity-75 " id="exampleInputEmail1" name="h" aria-describedby="emailHelp" required>
          </span> 
          <span class=" my-5 col-4 text-white">
          <label for="exampleInputEmail1" class="form-label pt-1">Duration in minutes</label>
          <input id="m" type="text" class="form-control fw-bold opacity-75 " id="exampleInputEmail1" name="m" aria-describedby="emailHelp" required>
      </span> 
       
        
        <button type="submit" class="btn btn-primary my-1 me-3 col-4 bg-success fs-4" onclick="return Create()">Create</button>

        <button type="submit" class="btn btn-primary my-1 me-3 col-4 bg-success fs-4" onclick="view()">view list</button>

        <button id="back" class="btn btn-primary my-1 col-2 bg-danger fs-4" onclick="goback()"><i class="fa-solid fa-backward"></i></button>


        <!-- <button class="btn btn-primary my-1 col-12 bg-success fs-4" onclick="Continu()">Continue</button> -->

      </form>

    </div>
    </div>


    <script>

      function goback()
      {
        window.location.href="C_or_V.php";
      }


    function Create()
    {
      // console.log("create");
    //   window.location.href="create_class.php";
    let id = document.forms["myForm"]["id"].value;
    let p_name= document.forms["myForm"]["p_name"].value;
    let msg= document.forms["myForm"]["msg"].value;
    let dur= document.forms["myForm"]["dur"].value;
        // let y = document.forms["myForm"]["pass"].value;
        if(p_name.length<=2 || p_name.length>=12)
        {
          alert("Party name must be between 1 to 12 characters.");
          document.getElementById("p_name").value ="";
          return false;
        }
       else if(id.length<=3 || id.length>=10)
       {
        alert("ID should be between 3 to 10 characters.");
          document.getElementById("id").value ="";
          return false;
       }
        else
        {
          return true;
        }
    }
    function view()
    {
      let id=prompt("Please enter the election id :");
       window.location.href=`list.php?id=${id}`;
    }
   </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  </body>
</html>
