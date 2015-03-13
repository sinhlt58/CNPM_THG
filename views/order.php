<div class="row">

    <div class="col-md-2">
        <a class="btn btn-default" href="<?php echo NAME_DOMAIN.'/new-order' ?>">
            <div style="width: 100px; height: 100px;"><p>New Order</p></div>
        </a>
    </div>
    <div class="col-md-8">

        <div class="row">
            <?php

            $query = "SELECT * FROM orders WHERE restaurant_id = $restaurant[id] ORDER BY id DESC";
            $result = mysqli_query($dbc, $query);

            while ($list_orders = mysqli_fetch_assoc($result)){ ?>
                <?php

                $table_order = $list_orders['table_order'];
                $total_price = $list_orders['total_price'];
                $order_id = $list_orders['id'];

                ?>
                <div class="well col-md-8" style="margin: 30px 60px;">
                    <table class="table">
                        <thead>
                        <td></td>
                        <td>
                            <span>TABLE: <?php echo $table_order;?></span>
                        </td>
                        <td></td>
                        </thead>

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
                                <td><?php echo $amount*$food_price; ?>$</td>
                            </tr>
                        <?php  }  ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><span><?php echo $total_price;?>$</span></td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            <?php } ?>

        </div>

    </div>
    <div class="col-md-2"></div>

</div>