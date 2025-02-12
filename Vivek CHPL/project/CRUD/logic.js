$(document).ready(function () {
  $("#purchase_date").datepicker({ dateFormat: "yy-mm-dd" });

  $("#category").change(function () {
    var category = $(this).val();
    var subcategories = {
      Electronics: ["Mobile", "Laptop", "Camera", "Headphones"],
      Clothing: ["Shirt", "Trousers", "Jacket", "Shoes"],
      Grocery: ["Vegetables", "Fruits", "Dairy", "Bakery"],
      Books: ["Fiction", "Non-Fiction", "Educational", "Comics"],
      Sports: ["Cricket", "Football", "Badminton", "Tennis"],
    };
    $("#subcategory")
      .empty()
      .append('<option value="">Select Subcategory</option>');
    if (subcategories[category]) {
      subcategories[category].forEach(function (item) {
        $("#subcategory").append(new Option(item, item));
      });
    }
  });

  $("#discount, #price").on("input", function () {
    var price = parseFloat($("#price").val()) || 0;
    var discount = parseFloat($("#discount").val()) || 0;
    var finalPrice = price - (price * discount) / 100;
    $("#final_price").val(finalPrice.toFixed(2));
  });

  $("#product_image").change(function () {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#image_preview").attr("src", e.target.result).show();
    };
    reader.readAsDataURL(this.files[0]);
  });
});