<?php
session_start();
unset($_SESSION['count']);
session_destroy();



?>

<!DOCTYPE html>
<html>
<body>
			
           <?php echo  $_SESSION['count']  ?>
            <br>
            <a href="SS1.php">first page</a>
            
		</form>
        
</body>
</html>
