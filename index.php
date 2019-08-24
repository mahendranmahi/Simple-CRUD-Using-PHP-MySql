<?php
//  include mysql connection file using 'include_once'
include_once('config.php'); 
//  fetching data from databse in descending order (lastest entry first)
$result=mysqli_query($sqli,'select * from users order by id desc');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create, Read, Update, Delete CRUD Example Using PHP-Mysql</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
    <?php echo '<a class="buttons addnew" href="add.html">Add New</a>'; ?>
    <br><br>
    <table class='showtable'>
        <thead>
            <tr>
                <th>Name</th><th>Age</th><th>Email</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php   $cnf="'Are you sure you want to delete?'";
                while($res=mysqli_fetch_array($result)){
                    echo '<tr><td>'.$res['name'].'</td><td>'.$res['age'].'</td><td>'.$res['email'].'</td>';
                    echo '<td><a class="buttons edit" href="edit.php?id='.$res['id'].'"> Edit </a>&nbsp;&nbsp;<a href="delete.php?id='.$res['id'].'" class="buttons delete" onclick="return confirm('. $cnf.');"> Delete </a></td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>    
</body>
</html>