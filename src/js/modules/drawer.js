import $ from "./jquery.esm"

$("#drawer_btn").on("click", function () {
  $("body").toggleClass("is-drawer-active")
})
