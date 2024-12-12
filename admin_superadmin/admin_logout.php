<?php
include("session_connect.php");
session_start();

unset($_SESSION["id"]); //remove this data
session_destroy();

?>
	<script>
	alert("Log Out Successfully!!");
	</script>
<?php
header("location:admin_login.php");
?>