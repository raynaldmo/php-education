/**
 * Created by raynald on 2/23/15.
 */

var App = App || {};

App.go = function() {
  var ShopProduct = App.ShopProduct.ShopProduct;
  var CdProduct = App.ShopProduct.CdProduct;

  var div = document.getElementById('summary');

  var sp1 = new ShopProduct('The Boss', 'Diana', 'Diana Ross', 9.99);
  var text = sp1.getSummaryLine();

  var p1 = document.createElement('p');
  p1.innerHTML = text;
  div.appendChild(p1);

  var cd1 = new CdProduct('The Boss', 'Diana', 'Diana Ross', 9.99, '60 minutes');
  text = cd1.getSummaryLine();

  var p2 = document.createElement('p');
  p2.innerHTML = text;
  div.appendChild(p2);

};



