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

// Inheritance
function Square(side) {
  this.side = side;
  Rectangle.call(this, side, side);
}

Square.prototype = new Rectangle();
Square.prototype.constructor = Square;

// test that polymorphism works by creating
// getArea() function... but add 1 to it
// it does work!
Square.prototype.getArea = function() {
  return ((this.side * this.side) + 1);

};
