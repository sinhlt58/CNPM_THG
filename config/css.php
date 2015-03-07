<?php
// CSS
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">

<!-- jQuery CSS-->
<link rel="stylesheet" href="lib/jquery-ui-1.11.2/jquery-ui.min.css" />

<!-- Font awsome-->
<link rel="stylesheet" href="lib/font-awesome-4.3.0/css/font-awesome.min.css">



<style>
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 60px;
	}
	#wrap {
		min-heigt: 100%;
		height: auto;	
		margin: 0 auto -60px;
		padding: 0 0 60px;
	}
	
	#footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 60px;
	  background-color: #f5f5f5;
	}
	
	#btn-debug{
		position: absolute;
	}
	
	#console-debug {
		position: absolute;
		top: 50px;
		left: 0px;
		width: 30%;
		height: 700px;
		overflow-y:scroll;
		background-color: #FFFFFF;
		box-shadow: 2px 2px 5px #CCCCCC;
	}
	#console-debug pre{
			
	}

/*----- Accordion -----*/
	.accordion, .accordion * {
	    -webkit-box-sizing:border-box; 
	    -moz-box-sizing:border-box; 
	    box-sizing:border-box;
	}	
	.accordion {
	    overflow:hidden;
	    box-shadow:0px 1px 3px rgba(0,0,0,0.25);
	    border-radius:3px;
	    background:#f7f7f7;
	}
	
	/*Menu-------------------------------*/
	
	/*----------Category-----------------*/
	#edit-fc .edit-fc{
		display: none;
	}
	
	#edit-fc.edit-fc .edit-fc{
		display: initial;
	}
	
	#edit-fc.edit-fc .no-edit-fc{
		display: none;
	}
	/*----------End Category-----------------*/

	/*----------Food Item-----------------*/
	#edit-fi .edit-fi{
		display: none;
	}
	
	#edit-fi.edit-fi .edit-fi{
		display: initial;
	}
	
	#edit-fi.edit-fi .no-edit-fi{
		display: none;
	}
	/*----------End Food Item-----------------*/	
	
	/*End menu--------------------------*/
</style>