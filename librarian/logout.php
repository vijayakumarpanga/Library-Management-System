<?php
session_start();
unset($_SESSION["name"]); 
?>
<script type="text/javascript">
	window.location="login.php";
</script>