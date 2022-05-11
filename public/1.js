$(document).ready(function(){
  $("#one").click(function(e){
	e.preventDefault();  
	$("#result").load("pages/1.html");
   });
   
	$("#two").click(function(e){
	e.preventDefault();  
	$("#result").load("pages/2.html");
	}); 
	
	$("#three").click(function(e){
	e.preventDefault();  
	$("#result").load("/3");
	}); 	
}); 