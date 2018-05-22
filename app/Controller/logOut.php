?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
 
session_destroy(); 
header("Location: ../View/Pages/index.html");
?>

</body>
</html>