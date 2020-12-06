<?php

			echo "Old password is: " . $_REQUEST["pass"];	
            echo "<br>";
			echo "New password is: " . $_REQUEST["cpass"];		
			
			
	?>
	<br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">