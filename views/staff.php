<div class="w-section">
    <div class="w-container">
      <h4>Add Staff:</h4>

        <div id="errors">
            <p>empty email</p>
            <p>has been already in your list</p>
            <p>does not exit</p>
            <p>add successfully</p>
        </div>

        <div class="w-form newsletter-form">
            <input id="search-email" name="search_email" type="email" class="w-input newsletter-field form-control" placeholder="Search for email...">
            <input id="add-staff" class="w-button newsletter-button" type="button" value="Add" restaurant-id="<?php echo $restaurant['id'];?>">
        </div><!-- /input-group -->
        <br>
        <br>
        <h4>Your Current Staffs:</h4>
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

                    <li class="w-row w-staff-items">
                        <p class="w-staff-name"><?php echo $data_user['first_name'].' '.$data_user['last_name']; ?></p>
                        <p class="w-staff-email email-item"><?php echo $data_user['email'].'<br>'; ?></p>
                    </li>

            <?php  } ?>

        </div>

        <template id="staff-item">
            <li class="w-row w-staff-items">
                <p class="w-staff-name">{{fullName}}</p>
                <p class="w-staff-email email-item">{{email}}</p>
            </li>
        </template>
    </div>
</div>
<script src="js/staff.js" type="text/javascript"></script>