<?php
 
include "connection.php";
$id=$_GET["id"];
$a=date("D-M-Y");
mysqli_query($link,"update issue_books set book_return_date='$a' where id=$id" );
$bookname="";
$ress=mysqli_query($link," select * from issue_books where id=$id ");
while($rows=mysqli_fetch_array($ress))
    {

		$bookname=$rows["bookname"];
    }
    mysqli_query($link,"update add_books set available_qty=available_qty+1 where book_name='$bookname'");
?>
 <script type="text/javascript">

 window.location="return_books.php"

  </script>
