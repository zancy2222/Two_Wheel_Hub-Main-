$(document).ready(function() {
    // Check if cart count is stored in localStorage
    if (localStorage.getItem('cartCount')) {
        var cartCount = parseInt(localStorage.getItem('cartCount'));
    } else {
        var cartCount = 0;
    }
    $('.cart-count').text(cartCount);

    $('.btn-add-to-cart').click(function() {
        cartCount++;
        $('.cart-count').text(cartCount);
        localStorage.setItem('cartCount', cartCount);
    });
});