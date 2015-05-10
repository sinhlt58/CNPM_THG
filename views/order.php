
<div class="w-section w-main">
    <div class="w-container">
        <div class="w-row">
            <div class="w-col w-col-3">
                <a class="button hollow new-order-button" href="<?php echo NAME_DOMAIN.'/new-order' ?>">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Order
                </a>
            </div>
            <div class="w-col w-col-9">
                <div class="w-row" id="show-orders" restaurant-id="<?php echo $restaurant['id']; ?>">
                </div>
            </div>
        </div>
    </div>
</div>