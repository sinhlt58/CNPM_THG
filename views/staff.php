<div class="row">

    <div class="col-lg-6">

        <div id="errors">
            <p>empty email</p>
            <p>has been already in your list</p>
            <p>does not exit</p>
            <p>add successfully</p>
        </div>

        <div class="input-group">
          <span class="input-group-btn">
            <button id="add-staff" class="btn btn-default" type="button" restaurant-id="<?php echo $restaurant['id'];?>">Add</button>
          </span>
            <input id="search-email" name="search_email" type="email" class="form-control" placeholder="Search for email...">
        </div><!-- /input-group -->
        <br>
        <br>
        <div id="list-staff" class="list-group">

            <?php

                $query1 = "SELECT user_id FROM users_restaurants WHERE restaurant_id = $restaurant[id]";
                $result1 = mysqli_query($dbc, $query1);

                while ($list_user = mysqli_fetch_assoc($result1)){ ?>

                    <?php

                        $query2 = "SELECT first_name, last_name, email FROM users WHERE id = $list_user[user_id]";
                        $result2 = mysqli_query($dbc, $query2);

                        $data_user = mysqli_fetch_assoc($result2);

                    ?>

                    <li class="list-group-item">
                        <p><?php echo $data_user['first_name'].' '.$data_user['last_name']; ?></p>
                        <p class="email-item"><?php echo $data_user['email'].'<br>'; ?></p>
                    </li>

            <?php  } ?>

        </div>

        <template id="staff-item">
            <li class="list-group-item">
                <p>{{fullName}}</p>
                <p class="email-item">{{email}}</p>
            </li>
        </template>

    </div>


</div>

<script src="js/staff.js" type="text/javascript"></script>