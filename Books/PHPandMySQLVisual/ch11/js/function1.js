// Script 11.3-1 - function1.js

var ul = document.getElementById('image-list');

ul.onclick = function create_window (evt) {
  evt.preventDefault();

  console.log(evt.target); // link
  console.log(evt.currentTarget); // <ul>
  console.log(this); // <ul>

  var elem = evt.target;
  if (elem.tagName != 'A') {
    return false;
  }

  var image = elem.dataset.imageName;
  var width = parseInt(elem.dataset.imageWidth,10);
  var height = parseInt(elem.dataset.imageHeight,10);


  // Add some pixels to the width and height:
  width += 10;
  height += 10;

  console.log('width:' + width);
  console.log('height:' + height);

  // debugger;

  // If the window is already open,
  // resize it to the new dimensions:
  if (window.popup && !window.popup.closed) {
    window.popup.resizeTo(width, height);
  }

  // Set the window properties:
  var specs = "location=no, scrollbars=no, " +
    "menubars=no, toolbars=no, resizable=yes, left=0, top=0, " +
    "width=" + width + ", height=" + height;

  // Set the URL:
  var url = "show_image.php?image=" + image;

  // Create the pop-up window:
  popup = window.open(url, "ImageWindow", specs);
  popup.focus();



  return false;
};