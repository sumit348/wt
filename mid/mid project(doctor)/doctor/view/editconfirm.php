	<?php

			echo "Name is: " . $_REQUEST["mname"];	
            echo "<br>";
			echo "Id is: " . $_REQUEST["userId"];		
			echo"<br>";
			echo "Email id is: " . $_REQUEST["memail"];
			echo"<br>";
			echo "Phone no is: " . $_REQUEST["mphone"];
			
	?>
	<br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">