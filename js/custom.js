/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

$(document).ready(function () {
	
$('.box-trigger').hover(
 function() {
       $(this).next('.box-overlay').animate({"opacity":"0"}, 100); 
 },
 function() {
       $(this).next('.box-overlay').animate({"opacity":".88"}, 100); 
  }
);


// $(".myLink").bind("click", function() {
//     $(".hidden-div").hide();
// 	// deactivate the active class for the bubble
// 	$(".myLink").removeClass('active');
//     var divId= $(this).attr("divId");
//     $("#" + divId).show();
// 	// activate the active class for the bubble
// 	$(this).addClass('active');
// });



// make product lists equal height.
var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;

 $('.blocks').each(function() {

   $el = $(this);
   topPostion = $el.position().top;
   
   if (currentRowStart != topPostion) {

     // we just came to a new row.  Set all the heights on the completed row
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }

     // set the variables for the new row
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);

   } else {

     // another div on the current row.  Add it to the list and check if it's taller
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

  }
   
  // do the last row
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
   
 });


});// END #####################################    END