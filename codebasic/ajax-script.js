$(document).on("submit", "#productForm", function (e) {
  e.preventDefault();

  $.ajax({
    method: "POST",
    url: "php-script.php",
    // data: $(this).serialize(),
    data: new FormData(this),
    success: function (data) {
      $("#msg").html(data);
      $("#productForm").find("input").val("");
    },
  });
});
