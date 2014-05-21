// JavaScript Document

$j = jQuery.noConflict();

//add .expanded and .collapsed class style
function prepareList() {
    $j('.expList').find('li:has(ul)')
    .click( function(event) {
        if (this == event.target) {
            $j(this).toggleClass('expanded');
            $j(this).children('ul').toggle('medium');
        }
        return false;
    })
    .addClass('collapsed')
    .children('ul').hide();
 
 //enable a href click
	$j('.expList a').bind('click', function() {		
		location.href = ($j(this).attr('href'));
	});
 
 
};//end prepareList


//relies on $ within the safety of a function
( function($) {
    $(document).ready( function() { 
			
			  prepareList()
			 
		} );
} ) ( jQuery );

//$(document).ready( function() {
    //prepareList()
//});
