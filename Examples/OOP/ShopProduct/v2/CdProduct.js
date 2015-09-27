/**
 * Created by raynald on 2/23/15.
 */

// Namespace for CdProduct Class

// TODO: not sure why App.ShopProduct is not seen inside App.CdProduct

App.CdProduct = (function() {
  function CdProduct(title, first_name, main_name, price, play_len) {

    App.ShopProduct.call(this, title, first_name,main_name,price);
    this.play_len = play_len || 0;

  }

// Inheritance mechanism
  CdProduct.prototype = new App.ShopProduct();

  CdProduct.prototype.getPlayLength = function() {
    return this.play_len;
  };

  CdProduct.prototype.getSummaryLine = function() {
    console.log('CdProduct getSummaryLine()');

    var base = App.ShopProduct.prototype.getSummaryLine.call(this);

    base += ': playing time - ' + this.getPlayLength();
    return base;
  };

  CdProduct.prototype.constructor = CdProduct;

  return {CdProduct : CdProduct}

})();
