<div class="row">

    <div class="col-md-3" id="save-order">

        <div class="well">
            <table class="table">
                <thead>
                    <td></td>
                    <td>
                        <span id="table-number" style="cursor: pointer;">TABLE: click me..</span>
                        <input id="input-table-number" type="number" min="1" max="<?php echo $restaurant['number_of_table'];?>" value="1">
                    </td>
                    <td></td>
                </thead>
                <tbody id="body-save-order">
                    <template id="template-item-on-save-order">
                        <tr item-id={{itemId}} style="cursor: pointer" class="subtract-amount-item" title="click me to -1">
                            <td><span item-amount='{{itemAmount}}'>{{itemAmount}}</span></td>
                            <td><span class="item-name">{{itemName}}</span></td>
                            <td><span item-price='{{itemPrice}}'>{{itemPrice}}$</span></td>
                            <!--<td><a class="btn btn-default btn-xs "><span class="glyphicon glyphicon-minus"></span></a></td>-->
                        </tr>
                    </template>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><span id="total-amount-price" total-price="">0$</span></td>
                    </tr>
                </tbody>

            </table>
        </div>

        <a id="btn-save-order" class="btn btn-success btn-lg btn-block"  restaurant-id="<?php echo $restaurant['id'];?>">
            <span class="glyphicon glyphicon-ok"></span>Save
        </a>

    </div>

    <div class="col-md-9" id="choose-items">

        <?php

            $query = "SELECT * FROM food_categories WHERE restaurant_id=$restaurant[id] ORDER BY id DESC";
            $result = mysqli_query($dbc, $query);

            while($list_fc = mysqli_fetch_assoc($result)) { ?>

                <div>
                    <h6 class="text-center"><b><?php echo $list_fc['name']; ?></b></h6>

                    <?php
                    $query2 = "SELECT * FROM food WHERE fc_id=$list_fc[id] ORDER BY id DESC";
                    $result2 = mysqli_query($dbc, $query2);

                    while ($list_food = mysqli_fetch_assoc($result2)) { ?>
                        <?php
                            $itemName = $list_food['food_name'];
                            $itemPrice = $list_food['food_price'];
                            $itemId = $list_food['id'];
                        ?>
                        <button class="item-on-choose-order" item-name="<?php echo $itemName?>"  item-price="<?php echo $itemPrice;?>" item-id="<?php echo $itemId?>">
                            <div style="width: 80px; height: 80px;">
                                <span><?php echo $itemName;?></span>
                                <p><?php echo $itemPrice;?>$</p>
                            </div>
                        </button>

                    <?php } ?>
                </div>

        <?php } ?>

</div>