<div class="row">
        <?php

            $query = "SELECT * FROM users_restaurants WHERE user_id = $user[id]";
            $result = mysqli_query($dbc, $query);

            while ($list_restaurants_id = mysqli_fetch_assoc($result)){ ?>

                <?php
                    $query2 = "SELECT * FROM restaurants WHERE id = $list_restaurants_id[restaurant_id]";
                    $result = mysqli_query($dbc, $query2);

                    $restaurant = mysqli_fetch_assoc($result);
                    $restaurantId = $restaurant['id'];
                    $restaurantName = $restaurant['name'];
                ?>

                <form action="<?php echo NAME_DOMAIN;?>/menu" method="POST">
                    <input type="number" name="restaurantId" value="<?php echo $restaurantId;?>" style="display: none;">
                    <button type="submit" class="btn btn-default">
                        <div style="width: 200px; height: 200px;"><?php echo $restaurantName; ?></div>
                    </button>
                </form>

        <?php } ?>

</div>