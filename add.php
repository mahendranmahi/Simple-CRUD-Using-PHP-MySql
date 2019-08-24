<?php
//  include mysql connection file using 'include_once'
include_once('config.php');
// if add button post form values
if(isset($_POST['add'])){
    $name=mysqli_real_escape_string($sqli,$_POST['name']);
    $age=mysqli_real_escape_string($sqli,$_POST['age']);
    $email=mysqli_real_escape_string($sqli,$_POST['email']);
    //  check form fields empty or not
    if($name=='' || $age=='' || $email==''){
        if($name==''){echo '<p style="color:red">Name is Required..</p>';}
        if($age==''){echo '<p style="color:red">Age is Required..</p>';}
        if($email==''){echo '<p style="color:red">Email is Required..</p>';}
        echo '<br><a href="javascript:self.history.back()">Back</a>';
    }else{
        //  insert form values to database table
        $ins=mysqli_query($sqli,"insert into users(name,age,email) values('".$name."','".$age."','".$email."')");
        //  after insert redirect to home page
        header('Location:index.php');
    }
    
}else{
    echo '<br><a href="javascript:self.history.back()">Back</a>';
}