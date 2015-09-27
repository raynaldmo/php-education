/**
 * Created by raynald on 2/23/15.
 */

// Name space for ShopProduct Class
App.ShopProduct = (function() {

    function ShopProduct(title, first_name, main_name, price) {

      this.title = title || '';
      this.producer_first_name = first_name || '';
      this.producer_main_name = main_name || '';
      this.price = price || 0;
      this.discount = 0;

    }

    ShopProduct.prototype.getProducerFirstName = function() {
      return this.producer_first_name;

    };

    ShopProduct.prototype.getProducerMainName = function() {
      return this.producer_main_name;

    };

    ShopProduct.prototype.setDiscount = function(num) {
      this.discount = num;
    };

    ShopProduct.prototype.getDiscount = function() {
      return this.discount;
    };

    ShopProduct.prototype.getTitle = function() {
      return this.title;
    };

    ShopProduct.prototype.getPrice = function() {
      return this.price - this.discount;
    };

    ShopProduct.prototype.getProducer = function() {
      return this.producer_first_name + this.producer_main_name;
    };

    ShopProduct.prototype.getSummaryLine = function() {
      console.log('ShopProduct getSummaryLine()');

      return ( this.title + ' (' + this.producer_main_name + ', ' +
        this.producer_first_name + ')' );

    };

    return { ShopProduct : ShopProduct};

})();

