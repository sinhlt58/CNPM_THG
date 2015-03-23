
$(document).ready(function(){
    var $showOrders = $('#show-orders');
    var restaurantId = $showOrders.attr('restaurant-id');

    var firstLoad = setInterval(loadFirst, 0);

    var load = setInterval(load, 5000);

    url = 'ajax/load.php';

    function loadFirst(){
        clearInterval(firstLoad);
        $showOrders.load(url+'?restaurantId=' + restaurantId);
    }

    function load(){
        $showOrders.load(url+'?restaurantId=' + restaurantId);
    }

});