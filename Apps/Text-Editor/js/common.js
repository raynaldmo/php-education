/**
 * Created by raynald on 1/16/15.
 */

window.onload = function() {
  var status_line = document.querySelector('.status-line');
  var error_cancel = document.querySelector('.error-cancel');

  if (status_line) {
    error_cancel.onclick = function(evt) {
      status_line.style.display = 'none';
      // console.log(window.location.href);

      // This doesn't give what I want
      // console.log(window.location.href.match(/^(http).+\?/));

      // TODO: Use string split
      var idx = window.location.href.indexOf('?');

      // redirect to home page w/o query string
      window.location = window.location.href.slice(0,idx);

      return false;
    }
  }

};