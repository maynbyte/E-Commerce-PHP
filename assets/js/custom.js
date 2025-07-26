$(document).ready(function () {
  $(document).on("click", ".increment-btn", function (e) {
    e.preventDefault();
    let qty = $(this).closest(".product_data").find(".input-qty").val();

    let value = parseInt(qty, 10);
    value = isNaN(value) ? 1 : value;

    if (value < 10) {
      value++;
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".decrement-btn", function (e) {
    e.preventDefault();
    let qty = $(this).closest(".product_data").find(".input-qty").val();

    let value = parseInt(qty, 10);
    value = isNaN(value) ? 1 : value;

    if (value > 1) {
      value--;
      $(this).closest(".product_data").find(".input-qty").val(value);
    }
  });

  $(document).on("click", ".addToCartBtn", function (e) {
    e.preventDefault();

    let qty = $(this).closest(".product_data").find(".input-qty").val();
    let prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handleCart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Product Added to cart.");
        } else if (response == "exist") {
          alertify.success("Product already in cart");
        } else if (response == 401) {
          setTimeout(() => {
            window.location.href = "login.php";
          }, 1000);
          alertify.error("Login to continue");
        } else if (response == 500) {
          alertify.error("Uh-oh! Something went wrong!");
        }
      },
    });
  });

  $(document).on("click", ".updateQty", function () {
    let qty = $(this).closest(".product_data").find(".input-qty").val();
    let prod_id = $(this).closest(".product_data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "functions/handleCart.php",
      data: {
        prod_id: prod_id,
        prod_qty: qty,

        scope: "update",
      },
      success: function (response) {
        // alert(response);
      },
    });
  });

  $(document).on("click", ".deleteItem", function () {
    let cart_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "functions/handleCart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Item removed successfully!");
          $("#mycart").load(location.href + " #mycart");
        } else {
          alertify.success(response);
        }
      },
    });
  });
});
