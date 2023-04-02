<?php
$mysqli= mysqli_connect('localhost', 'root', 'root', 'test');
if(mysqli_connect('localhost','root', 'root')){


}


$query =mysqli_query($mysqli,"SELECT * FROM `test`.`nums`");
$col="color='#f9f9f9'";
while($row = mysqli_fetch_array($query)){
    $id=$row['id'];
    $num=$row['num'];
    $firstname=$row['name'];
    $lastname=$row['lastname'];
    $status=$row['status'];
    if($status=='Свободен')
    {
        echo
        "&nbsp;
<h1 style='font-size:45px; color: green;'>&nbsp;&nbsp;
$num<strong style='color: green'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$status</strong> </h1>";
    }

}
// $col="//color='#f9f9f9'";
mysqli_close($mysqli);
?>

