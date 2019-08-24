<?php
//  include mysql connection file using 'include_once'
require_once('config.php');
//  get delete record id from URL in $_GET method
$id=$_GET['id'];
//  delete particular record from database table
mysqli_query($sqli,'delete from users where id='.$id);
header('Location:index.php');