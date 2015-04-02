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
            <button id="add-staff" class="btn btn-default" type="button">Add</button>
          </span>
            <input id="search-email" name="search_email" type="email" class="form-control" placeholder="Search for email...">
        </div><!-- /input-group -->

        <div id="list-staff">

            <?php

                $query1 = "SELECT user_id FROM users_restaurants WHERE restaurant_id = $restaurant[id]";
                $result1 = mysqli_query($dbc, $query1);

                while ($list_user = mysqli_fetch_assoc($result1)){ ?>

                    <?php

                        $query2 = "SELECT first_name, last_name, email FROM users WHERE id = $list_user[user_id]";
                        $result2 = mysqli_query($dbc, $query2);

                        $data_user = mysqli_fetch_assoc($result2);

                        if (!$result12){

                        }

                        echo $data_user['first_name'].' '.$data_user['last_name'].'<br>';
                        echo $data_user['email'].'<br>';


                    ?>

            <?php  } ?>

        </div>

    </div>

</div>

<script src="js/staff.js"></script>