/**
 * Created by raynald on 2/7/15.
 */

function Rectangle(width, height) {
  this.width = width || 0;
  this.height = height || 0;

}

Rectangle.prototype.setSize = function(w, h) {
  this.width = w;
  this.height = h;
};

Rectangle.prototype.getArea = function() {
  return (this.width * this.height);
};

Rectangle.prototype.getPerimeter = function() {
  return ( (this.width + this.height) * 2);
};

Rectangle.prototype.isSquare = function() {
  return (this.width == this.height);

};