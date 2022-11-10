<?php
session_start();
unset($_SESSION['count']);
?>

<!DOCTYPE html>
<html>
<body>
			
           <?php echo  $_SESSION['count']  ?>
            <br>
            <a href="sessionDoc.php">first page</a>
            
		</form>
        
</body>
</html>