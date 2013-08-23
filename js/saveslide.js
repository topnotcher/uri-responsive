( function($) {
    $(document).ready( function() { 
			
		$("a.mylink").attr("href", "#");
			 
		// Expand Panel
		$(".open").click(function(){
			$("div#panel").slideDown("slow");
	
			});	
	
		// Collapse Panel
		$(".close").click(function(){
			$("div#panel").slideUp("slow");	
		});		
	
		// Switch buttons from "Log In | Register" to "Close Panel" on click
		$(".toggle a").click(function () {
			$(".toggle a").toggle();
		});		//end Expand and Collapse 
			 
			 
			 
		} );
} ) ( jQuery );