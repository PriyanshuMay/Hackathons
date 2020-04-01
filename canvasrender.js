document.addEventListener('DOMContentLoaded',domloaded,false);
function domloaded(){
    var c = document.getElementById("canva");
var ctx = c.getContext("2d");

     /* var start = "Start"
                var width = context.measureText(start).width;
                var height = context.measureText("w").width;
                context.fillStyle = "black";
                var font = "bold " + width + "px courier"; // font color to write the text with
                context.font = font;
                context.fillText(start, 240, 50);

              function drawOval(x, y, rw, rh) {
                    context.save();
                    context.scale(1, rh / rw);
                    context.beginPath();
                    context.arc(x, y, rw, 0, 2 * Math.PI);
                    context.restore();
                    context.strokeStyle = "green";
                    context.stroke();
                }
                drawOval(270, 100, 100, 40);  

                context.font = fontSize+'px Arial';
// the text position
var x = 50, y=50;
// the string to draw
var str = "Hello yyyqqqppp ";

context.strokeStyle="red";

// get every characters positions
var chars = [];
for(var i=0; i<str.length;i++) {
    if (str[i] === "y" || str[i] === "p") 
    	chars.push(i);
}
//iterate through the characters list
for(var i=0; i<chars.length; i++){
  // get the x position of this character
  var xPos = x+context.measureText(str.substring(0,chars[i])).width;
  // get the width of this character
  var width = context.measureText(str.substring(chars[i],chars[i]+1)).width;
  // get its height through the 1.286 approximation
  var height = fontSize*1.286;
  // get the y position
  var yPos = y-height/1.5
  // draw the rect
  context.strokeRect(xPos, yPos, width, height);
  }
// draw our text
context.fillText(str, x, y);*/

var fontsize = 14;
var fontface = 'courier';
var lineHeight = fontsize * 3;
var text = 'this box resizes according to the lenght of variable';

ctx.font = fontsize + 'px ' + fontface;
var textWidth = ctx.measureText(text).width;

ctx.textAlign = 'left';
ctx.textBaseline = 'top';

ctx.fillText(text, 20, 60);
ctx.strokeRect(20, 50, textWidth+20, lineHeight+20);
}
