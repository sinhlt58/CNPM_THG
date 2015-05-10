<div class="w-section w-main ">
    <div class="w-container">
      <div class="w-row">

        <div class="w-col w-col-4" id="save-order" user-full-name="<?php echo $user['fullname'];?>">

            <div class="w-order plan-wrapper">


                <h4>Your Order</h4>
                
                <div id="body-save-order">
                    <template id="template-item-on-save-order">
                        <div class="w-order-deatail">
                            <div class="w-row">
                                <div item-id={{itemId}} style="cursor: pointer" class="subtract-amount-item" title="Click to -1">
                                    <div class="w-col w-col-2"><span item-amount='{{itemAmount}}'>{{itemAmount}}</span></div>
                                    <div class="w-col w-col-5"><span class="item-name">{{itemName}}</span></div>
                                    <div class="w-col w-col-3"><span item-price='{{itemPrice}}'>{{itemPrice}}$</span></div>
                                    <div class="w-col w-col-2"><a class="button w-button-subtract" href="#">-</a></div>
                                    <!--<td><a class="btn btn-default btn-xs "><span class="glyphicon glyphicon-minus"></span></a></td>-->
                                </div>
                            </div>
                        </div>
                    </template>
                    <div class="w-order-total">
                        <div class="w-row">
                            <div class="w-col w-col-7">
                              <div>Total</div>
                          </div>
                          <div class="w-col w-col-5 price-accent"><span id="total-amount-price" total-price="">0$</span></div>
                      </div>
                  </div>
              </div>  
          </div>
          <label>Select Table:
          <span id="table-number" style="cursor: pointer;"></span>
            <input id="input-table-number" type="number" min="0" max="<?php echo $restaurant['number_of_table'];?>" value="1">
            </label>
          <a id="btn-save-order" style="float: right;" class="w-button log-in-button button" href="#" restaurant-id="<?php echo $restaurant['id'];?>">
            Send Order
        </a>

    </div>


    <div class="w-col w-col-8" id="choose-items">

        <?php

        $query = "SELECT * FROM food_categories WHERE restaurant_id=$restaurant[id] ORDER BY id DESC";
        $result = mysqli_query($dbc, $query);

        while($list_fc = mysqli_fetch_assoc($result)) { ?>

        <div class="w-category-menu">
            <h4 class="w-food-item-heading"><b><?php echo $list_fc['name']; ?></b></h4>

            <?php
            $query2 = "SELECT * FROM food WHERE fc_id=$list_fc[id] ORDER BY id DESC";
            $result2 = mysqli_query($dbc, $query2);

            while ($list_food = mysqli_fetch_assoc($result2)) { ?>
            <?php
            $itemName = $list_food['food_name'];
            $itemPrice = $list_food['food_price'];
            $itemId = $list_food['id'];
            ?>
            <div class="w-row w-food-items">
                <div class="w-col w-col-4">
                  <div class="w-food-name"><?php echo $itemName;?></div>
              </div>
              <div class="w-col w-col-4">
                  <div class="w-food-price">$<?php echo $itemPrice;?></div>
              </div>
              <div class="w-col w-col-4 w-clearfix item-on-choose-order" item-name="<?php echo $itemName?>"  item-price="<?php echo $itemPrice;?>" item-id="<?php echo $itemId?>"><a class="button w-edit-button hollow" href="#">Add to Order</a>
              </div>
          </div>


          <?php } ?>
      </div>

      <?php } ?>

  </div>
</div>
</div>
</div>