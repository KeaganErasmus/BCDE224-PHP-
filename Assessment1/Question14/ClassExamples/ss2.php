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
			
           <?php echo  $_SESSION['count']  ?>
            <br>
			<a href="SS1.php">first page</a>
            <a href="SS3.php">last page</a>
            
		</form>
        
</body>
</html>
