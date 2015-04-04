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

<!-- Tinymce.js -->
<script src="js/tinymce/tinymce.min.js"></script>

<!-- Dropzone.js -->
<script src="js/dropzone.js"></script>

<!-- Atom.SaveOnBlur -->
<script src="js/jquery.atom.SaveOnBlur.js"></script>

<script>
	
	$(document).ready(function(){
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		$(".btn-delete").on("click", function() {
		
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure want to delete this page?");
			
			if (confirmed == true) {
				$.get("ajax/pages.php?id="+pageid);
			
				$("#page_"+pageid).remove();
			
			}
					
			
			//alert(selected);
		});
		
		$("#sort-nav").sortable({
			cursor: "move", 
			update: function() {
				var order = $(this).sortable("serialize");
				$.get("ajax/list-sort.php", order);
			}
		});
		
		
		$(".nav-form").submit(function(event){
			
			var navData = $(this).serializeArray();
			var navLabel = $('input[name=label]').val();
			var navID = $('input[name=id]').val();
			
			$.ajax({
				
				url: "ajax/navigation.php",
				type: "POST",
				data: navData
				
			}).done(function(){
			
				$("#label_"+navID).html(navLabel);	
				
			});
				
			event.preventDefault();
			
		});		
		
	});// End document .ready();
	
	
	
	
	
	
tinymce.init({
    selector: ".editor",
    theme: "modern",
    plugins: [
         "code advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo  styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
	
</script>
