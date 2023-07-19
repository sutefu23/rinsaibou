(function () {
  'use strict';

  var $ = window.jQuery;

  $("#drawer_btn").on("click", function () {
    $("body").toggleClass("is-drawer-active");
  });

})();
