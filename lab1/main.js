"use strict";


function showCard(formData) {
  formData.forEach(function(e) {
    $("#" + e.name).text(e.value);
    $("#card").css(e.name, e.value);
  })

  $("#card").fadeIn(200);

  // modify the browser back-history.
  // then the user can use the back button to go back to the form
  history.pushState(null, null, "#card");
}

$(document).ready(function() {
  $("#printButton").click(function() {
    var form = $("form");
    form.hide()
    showCard(form.serializeArray());
  });

  $("#resetButton").click(function() {
    $("form").trigger("reset");
  });
});

$(window).bind('popstate', function (event) {
  if (event.state !== null) {
    // when the user pressed the back button to go back to the form:
    //    hide the card and show the form
    $("#card").hide();
    $("form").show();
  }
});
