<?php
// Javascript

?>
<!-- jQuery -->
<script src="lib/jquery-2.1.3.min.js"></script>

<!-- jQuery UI -->
<script src="lib/jquery-ui-1.11.2/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="lib/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>

<!-- Mustache -->
<script src="lib/mustache.min.js"></script>

<!-- Menu -->
<script src="js/menu.js"></script>

<!-- New Order -->
<script src="js/new-order.js"></script>

<!-- Order -->
<script src="js/order.js"></script>

<script>
	
	$(document).ready(function(){
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});

	});

</script>
