<?php

include('../config/connection.php');
include('../classes/time_ago.php');

?>
<?php

$restaurant_id = $_GET['restaurantId'];

$query = "SELECT * FROM orders WHERE restaurant_id = $restaurant_id ORDER BY id DESC";
$result = mysqli_query($dbc, $query);

while ($list_orders = mysqli_fetch_assoc($result)){ ?>
<?php

$table_order = $list_orders['table_order'];
$total_price = $list_orders['total_price'];
$order_id = $list_orders['id'];
$time_created = $list_orders['created'];
$creator = $list_orders['creator'];

$timeAgoObject = new convertToAgo();
$ts = date('y-m-d G:i:s', $time_created);
$convertedTime = ($timeAgoObject->convert_datetime($ts));
$when = ($timeAgoObject->makeAgo($convertedTime));

?>
<div class="w-col w-col-4">
    <div class="w-order plan-wrapper">
        <h4>Table <?php echo $table_order;?></h4>
        <div>
            <div class="w-order-deatail">
                <?php
                $query2 = "SELECT * FROM food_orders WHERE order_id = $order_id";
                $result2 = mysqli_query($dbc, $query2);

                while ($list_items = mysqli_fetch_assoc($result2)){ ?>
                <?php

                $amount = $list_items['amount'];
                $food_id = $list_items['food_id'];

                $query3 = "SELECT * FROM food WHERE id=$food_id";
                $result3 = mysqli_query($dbc, $query3);
                $food_data = mysqli_fetch_assoc($result3);
                $food_name = $food_data['food_name'];
                $food_price = $food_data['food_price'];

                ?>
                <div class="w-row">
                    <div class="w-col w-col-2">
                      <div><?php echo $amount; ?></div>
                  </div>
                  <div class="w-col w-col-6">
                      <div><?php echo $food_name; ?></div>
                  </div>
                  <div class="w-col w-col-4">
                      <div>$<?php echo $amount*$food_price; ?></div>
                  </div>
              </div>

              <?php  }  ?>
          </div>
      </div>
      <div class="w-order-total">
          <div class="w-row">
            <div class="w-col w-col-8">
              <div>Total</div>
          </div>
          <div class="w-col w-col-4">
              <div class="price-accent">$<?php echo $total_price;?></div>
          </div>
      </div>
  </div>
  <div class="w-order-info">
  <div class="italic-right">Created by <?php echo $creator;?></div>
  <div class="italic-right"><?php echo $when;?></div>
</div>

</div>
</div>

<?php } ?>