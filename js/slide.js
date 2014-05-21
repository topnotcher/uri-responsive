( function($) {

$(document).ready(function() {

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
  $("a.toggleclosemobile").click(function () {
    $("a.toggleclosemobile").toggle();
  });    
  
  // Expand Panel
  $(".opensearch").click(function(){
    $("div#search").slideDown("slow");
  
  });  
  
  // Collapse Panel
  $(".closesearch").click(function(){
    $("div#search").slideUp("slow");  
  });    
  
  // Switch buttons from "Log In | Register" to "Close Panel" on click
  $(".togglesearch a").click(function () {
    $(".togglesearch a").toggle();
  });  
  
  // Show the drawer closer only without toggles
  $("a.toggle").click(function () {
    $("a.toggleclose").show();
  });
  
    // Switch buttons from "Log In | Register" to "Close Panel" on click
  $(".toggleall a").click(function () {
    $(".toggleall a").toggle();
  }); 
  
   // Force the drawer closers to close itself
  $("a.toggleclose").click(function () {
    $("a.toggleclose").toggle();
  });
    
});

} ) ( jQuery );

