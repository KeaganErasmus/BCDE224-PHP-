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
            <a href="SS2.php">next page</a>
            
		</form>
        
</body>
</html>