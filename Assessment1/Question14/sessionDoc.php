<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>

<!DOCTYPE html>
<html>
<body>
		<form>
           <?php echo  $_SESSION['count']  ?>
            <br>
            <a href="sessionDocReset.php">Reset Count</a>   
		</form>

    <form>
            <br>
            <a href="sessionDoc.php">Add Count</a>   
		</form>
        
</body>
</html>