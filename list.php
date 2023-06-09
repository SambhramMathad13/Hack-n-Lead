<?php
include 'connect.php';
$id = $_GET['id'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
            background-image: url(https://wallpaperaccess.com/full/2206441.png);
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        #con {
            background-color: black;
            overflow-y: scroll;
            height: 69vh;

        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>


    <!-- <div class="container my-5 col-sm-3 col-lg-3  my-5 bg-transperant mt-5 text-white fw-bold border-1  roundedborder  shadow-lg">
    <div class="formm" class="mb-3 my-5 col-12 text-white" style="margin-top:21vh">

   

    <div class=" mb-3 my-5 col-12 text-white display-4 fw-bold ">
          Welcome to attendence application 
        </div>
    
       

    </div>
    </div> -->


    <div id="chat">



        <h2 class="mt-5 lead-3 ms-5">The parties created are as below <button id="back" class="btn btn-primary my-1 col-2 bg-danger fs-4 ms-5 " onclick="goback()"><i class="fa-solid fa-backward"></i></button></h2>

        <div class="container mt-5" id="con">

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
        function goback() {
            window.location.href = "create_party.php";
        }

        setInterval(fetchh, 1000);

        function fetchh() {

            $.post("fetch1.php", {

                    id: '<?php echo $id; ?>'
                },
                function(data, status) {
                    document.getElementById('con').innerHTML = data;

                });
        }

        // function del(text) {
        //     // console.log(text);

        //     // let urll = window.location.href;
        //     let urlll = new URL("http://localhost/attend/takee_attend.php?name=");
        //     urlll.searchParams.set('class',text);
        //     window.location.href=urlll;
        // }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>