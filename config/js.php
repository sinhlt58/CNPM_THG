<?php
// Javascript

?>
<!-- jQuery -->
<script src="lib/jquery-ui-1.11.2/jquery-2.1.3.min.js"></script>

<!-- jQuery UI -->
<script src="<link rel="stylesheet" href="lib/jquery-ui-1.11.2/external/jquery/jquery.js">"></script>
<script src="lib/jquery-ui-1.11.2/jquery-ui.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="lib/bootstrap/js/bootstrap.min.js"></script>


<script>
	
	$(document).ready(function(){
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		$(".btn-delete").on("click", function() {
		
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure want to delete this item?");
			
			if (confirmed == true) {
				$.get("ajax/menu.php?id="+pageid);
			
				$("#page_"+pageid).remove();
			
			}
								
			//alert(selected);
		});
		
	});
	
</script>
