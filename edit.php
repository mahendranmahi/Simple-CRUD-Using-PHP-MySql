<?php
//  include mysql connection file using 'include_once'
require_once('config.php');
//   get update record id from URL in $_GET method
$id=$_GET['id'];
//  fetch information of getting id
$result=mysqli_query($sqli,'select * from users where id='.$id);
while($res=mysqli_fetch_array($result)){
    $name=$res['name'];
    $age=$res['age'];
    $email=$res['email'];
    $id=$res['id'];
}
//  if update button is clicked to check update button post form fields
if(isset($_POST['update'])){
    $id=mysqli_real_escape_string($sqli,$_POST['id']);
    $name=mysqli_real_escape_string($sqli,$_POST['name']);
    $age=mysqli_real_escape_string($sqli,$_POST['age']);
    $email=mysqli_real_escape_string($sqli,$_POST['email']);
    //  check field values empty or not
    if($name=='' || $age=='' || $email==''){
        if($name==''){echo '<p style="color:red">Name is Required..</p>';}
        if($age==''){echo '<p style="color:red">Age is Required..</p>';}
        if($email==''){echo '<p style="color:red">Email is Required..</p>';}
        echo '<br><a href="javascript:self.history.back()">Back</a>';
    }else{
        //  update values to database table
        $ins=mysqli_query($sqli,"update users set name='".$name."',age='".$age."',email='".$email."' where id=".$id);
    }
    header('Location:index.php');   
}
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
    <table class="showtable">
    <tbody class="addcol">
    <form action="edit.php" method="post">
        <tr><th colspan="2">Edit Information</th></tr>
        <tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td><tr>
        <tr><td>Age:</td><td><input type="text" name="age" value="<?php echo $age; ?>" /></td><tr>
        <tr><td>Email:</td><td><input type="text" name="email" value="<?php echo $email; ?>" /></td><tr>
        <tr><td colspan="2"  style="text-align: center"><input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="submit" class="buttons add" name="update" value="Update" /></td><tr>
    </form>
    </tbody>
    </table>
</body>
</html>