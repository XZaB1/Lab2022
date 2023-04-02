<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; Charset=UTF-8">
    <script type="text/javascript" src="jquery.js"></script>

    <title>Свободные номера</title>

    <!-- Bootstrap 4 CSS and custom CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" />
</head>
<br>
<br>
<br>
<br>
<div class=" bg-white fixed-top">
    <h1 class="card-header  text-center " style="font-size:60px;">Свободные номера</h1>
    <div><a href="../../profile.php" class="fixed-top" style="font-size:60px;color:#000000;">Назад</a>
    </div>
</div>



<div id="content"></div>
<div id="content1"></div>

<div class="body-content">




</div>


<!-- jQuery & Bootstrap 4 JavaScript libraries -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<h1></h1>
<div> &nbsp;


    <script>
        function show()
        {

            $.ajax({
                url: "script.php",
                cache: false,
                success: function(html){
                    $("#content").html(html);

                }
            });
        }

        $(document).ready(function(){
            show();
            setInterval('show()',60000);
        });


    </script>
</div>
</html>
