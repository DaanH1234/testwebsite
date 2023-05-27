$(document).ready(() =>{
    $('#hamburger-button').on('click', (e) =>{
        $('.welcome-page-header a').toggleClass('active')
        $('.welcome-page-header button').toggleClass('active')
    })

    $('#vouches').on('click', (b) =>{
        $('.p_box').toggleClass('active')
        $('#vouches').toggleClass('inactive')
        $('.vouches2').toggleClass('active')
    })

    $('#quality').on('click', (b) =>{
        $('.p_box1').toggleClass('active')
        $('#quality').toggleClass('inactive')
        $('.quality2').toggleClass('active')
    })

    $('#verified').on('click', (b) =>{
        $('.p_box2').toggleClass('active')
        $('#verified').toggleClass('inactive')
        $('.verified2').toggleClass('active')
    })

    $('#customers').on('click', (b) =>{
        $('.p_box3').toggleClass('active')
        $('#customers').toggleClass('inactive')
        $('.customers2').toggleClass('active')
    })

    $('.deleteorder').on('click', (e) =>{
        window.location.reload();
    })

    $('#dissapear').on('click', (c) =>{
        $('.top-header').toggleClass('inactive');
        $('.topheader-vink').toggleClass('active');
    })

    $('.topheader-vink img').on('click', (h) =>{
        $('.top-header').toggle();
    })

    $('#useroptions').on('click', () =>{
        $('.reason_blacklist').toggleClass('active');
    })

var shoppingCart = (function() {

    cart = [];
    
    // Constructor
    function Item(name, price, count, duration) {
      this.name = name;
      this.price = price;
      this.count = count;
      this.duration = duration;
    }
    
    // Save cart
    function saveCart() {
      sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }
    
      // Load cart
    function loadCart() {
      cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }
    if (sessionStorage.getItem("shoppingCart") != null) {
      loadCart();
    }
    
    var obj = {};
    
    // Add to cart
    obj.addItemToCart = function(name, price, duration, count) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart[item].count ++;
          saveCart();
          return;
        }
      }
      var item = new Item(name, price, duration, count);
      cart.push(item);
      saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(name, count) {
      for(var i in cart) {
        if (cart[i].name === name) {
          cart[i].count = count;
          break;
        }
      }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(name) {
        for(var item in cart) {
          if(cart[item].name === name) {
            cart[item].count --;
            if(cart[item].count === 0) {
              cart.splice(item, 1);
            }
            break;
          }
      }
      saveCart();
    }
  
    // Remove all items from cart
    obj.removeItemFromCartAll = function(name) {
      for(var item in cart) {
        if(cart[item].name === name) {
          cart.splice(item, 1);
          break;
        }
      }
      saveCart();
    }
  
    // Clear cart
    obj.clearCart = function() {
      cart = [];
      saveCart();
    }
  
    // Count cart 
    obj.totalCount = function() {
      var totalCount = 0;
      for(var item in cart) {
        totalCount += cart[item].count;
      }
      return totalCount;
    }
  
    // Total cart
    obj.totalCart = function() {
      var totalCart = 0;
      for(var item in cart) {
        totalCart += cart[item].price * cart[item].count;
      }
      return Number(totalCart.toFixed(2));
    }
  
    // List cart
    obj.listCart = function() {
      var cartCopy = [];
      for(i in cart) {
        item = cart[i];
        itemCopy = {};
        for(p in item) {
          itemCopy[p] = item[p];
  
        }
        itemCopy.total = Number(item.price * item.count).toFixed(2);
        cartCopy.push(itemCopy)
      }
      return cartCopy;
    }
  
    return obj;
  })();
  
  
  
  $('.add-to-cart').click(function(event) {
    event.preventDefault();
    var name = $(this).data('name');
    var duration = $(this).data('duration');
    var price = Number($(this).data('price'));
    shoppingCart.addItemToCart(name, price, 1, duration);
    displayCart();
  });
  

  $('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
  });
  
  
  function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for(var i in cartArray) {
      output += "<tr>"
        + "<td>" + cartArray[i].name + "</td>" 
        + "<td>(" + cartArray[i].duration + ")</td>"
        + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" + cartArray[i].name + ">-</button>"
        + "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
        + "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name + ">+</button></div></td>"
        + "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>"
        + " = " 
        + "<td>" + cartArray[i].total + "</td>" 
        +  "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
  }
  
 
  
  $('.show-cart').on("click", ".delete-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCartAll(name);
    displayCart();
  })
  
  

  $('.show-cart').on("click", ".minus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.removeItemFromCart(name);
    displayCart();
  })

  $('.show-cart').on("click", ".plus-item", function(event) {
    var name = $(this).data('name')
    shoppingCart.addItemToCart(name);
    displayCart();
  })
  
  $('.show-cart').on("change", ".item-count", function(event) {
     var name = $(this).data('name');
     var count = Number($(this).val());
    shoppingCart.setCountForItem(name, count);
    displayCart();
  });
  
  displayCart();


  let customer_count = 0;

  while(customer_count != 250)
  {
    customer_count++;
    $('.customer_count').html(customer_count)
    console.log(customer_count)
  }

 
  let products_count = 0;

  while(products_count != 500)
  {
    products_count++;
    $('.sold_count').html(products_count)
    console.log(products_count)
  }


  $('.customer_count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


$('.sold_count').each(function () {
  $(this).prop('Counter',0).animate({
      Counter: $(this).text()
  }, {
      duration: 2000,
      easing: 'swing',
      step: function (now) {
          $(this).text(Math.ceil(now));
      }
  });
});

});