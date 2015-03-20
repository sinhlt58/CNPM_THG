
<div class="row">

    <div id="load"></div>

    <div class="col-md-2">
        <a class="btn btn-default btn-lg btn-block" href="<?php echo NAME_DOMAIN.'/new-order' ?>">
            <div><p>New Order</p></div>
        </a>
    </div>
    <div class="col-md-8">

        <div class="row" id="show-orders">

            <div>

            </div>

            <?php

            $query = "SELECT * FROM orders WHERE restaurant_id = $restaurant[id] ORDER BY id DESC";
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
            <div class="pin col-md-3" style="margin: 15px 15px; padding: 10px;">
                <h4 align="center" style="font-weight: bold">TABLE: <?php echo $table_order;?></h4>
                <table class="table" style="font-size: 14px;color:#ababab;">
                    <tbody id="hey">
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
                        <tr>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $food_name; ?></td>
                            <td align="right"><?php echo $amount*$food_price; ?>$</td>
                        </tr>
                        <?php  }  ?>
                        </tbody>
                </table>
                <hr style="margin-top: -10px;margin-bottom: 10px;">
                    <table style="font-size: 14px;color:#ababab;width: 100%;">
                                    <tbody>
                                    <tr>
                                        <td><p style="text-align: left;  padding: 10px;">Total</p></td>
                                        <td></td>
                                        <td><p style="text-align: right;  padding: 12px;" class="ng-binding" ><?php echo $total_price;?>$</p></td>
                                    </tr>

                                    <tr>
                                        <td><p style="text-align: left;  padding: 10px;"><?php echo $creator;?></p></td>
                                        <td></td>
                                        <td><p style="text-align: right;  padding: 12px;" class="ng-binding" ><?php echo $when;?></p></td>
                                    </tr>
                                </tbody></table>
            </div>
            <?php } ?>

        </div>

    </div>
    <div class="col-md-2"></div>

</div>