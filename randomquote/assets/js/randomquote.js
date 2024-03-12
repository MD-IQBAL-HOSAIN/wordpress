console.log("rq works!!!");
 // shim layer with setTimeout fallback
 window.requestAnimFrame = (function(){
    return  function( callback ){
              window.setTimeout(callback, 2000);
            };
  })();

$(document).ready(function(){
 
var $shadow = $('#quoteContainer');
var shadowLimit = 200;
var moveEvent = ('ontouchstart' in document.documentElement) ? "touchmove" : "mousemove";

(function animloop(){
  requestAnimFrame(animloop);
    
  $(window).bind(moveEvent, function(ev){
    var $this = $(this);
    var w      = $this.width();
    var h      = $this.height();
    var center = { x: w/2, y: h/2 };
  
    var evX = (moveEvent == 'touchmove') ? ev.originalEvent.touches[0].clientX : ev.clientX;
    var evY = (moveEvent == 'touchmove') ? ev.originalEvent.touches[0].clientY : ev.clientY;
    
    var shadowX = (center.x - evX) / 10;
    var shadowY = (center.y - evY) / 10;
    
    shadowX = (shadowX > shadowLimit) ? shadowLimit : shadowX;
    shadowX = (shadowX < shadowLimit*-1) ? shadowLimit*-1 : shadowX;
    shadowY = (shadowY > shadowLimit) ? shadowLimit : shadowY;
    shadowY = (shadowY < shadowLimit*-1) ? shadowLimit*-1 : shadowY;
    
    $shadow.css({ textShadow: Math.ceil(shadowX) + 'px '+ Math.ceil(shadowY) +'px '+ Math.abs(shadowX*shadowY)/100 +'px rgba(0,0,0,0.8)' });
    
    
 });
})();
 

}); 