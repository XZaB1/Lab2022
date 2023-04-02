<?php
$mysqli= mysqli_connect('localhost', 'root', 'root', 'test');
if(mysqli_connect('localhost','root', 'root')){


}


$query =mysqli_query($mysqli,"SELECT * FROM `test`.`nums`");
$col="color='#f9f9f9'";
while($row = mysqli_fetch_array($query)){
    $id=$row['id'];
    $num=$row['num'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $status=$row['status'];
    $pass=$row['pass'];
    $fathername=$row['fathername'];
    $phone=$row['phone'];
    if($status=='Занят')
    {
        echo
        "&nbsp;
<h1 style='font-size:45px; color: red;'>&nbsp;&nbsp;
$num<strong style='font-size:70px; color: #ff0000;'>&nbsp;&nbsp;$firstname<strong style='font-size:70px; color: #ff0000;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$lastname</strong><strong style='font-size:70px; color: #ff0000;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fathername</strong><strong style='color: #ff0000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$pass</strong><strong style='color: #ff0000'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$phone</strong> </h1>";
    }

}
// $col="//color='#f9f9f9'";
mysqli_close($mysqli);
?>
