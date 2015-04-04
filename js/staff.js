$(document).ready(function(){

    var $addStaff = $("#add-staff");
    var $searchEmail = $("#search-email");
    var $listStaff = $("#list-staff")
    var $errors = $("#errors");
    var $templateStaffItem = $("#staff-item").html();

    $errors.find("p").hide();

    searchEmail($searchEmail);


    $addStaff.on('click', function(){

        var keyWord = $searchEmail.val();

        if (keyWord == ""){
            $errors.find("p").hide();
            $errors.children("p").eq(0).show();
        }else{

            if (isEmailOnList(keyWord, $listStaff)){
                $errors.find("p").hide();
                $errors.children("p").eq(1).show();
            }else{

                $.ajax({
                    url: 'ajax/check_search_email.php',
                    type: 'POST',
                    data: {keyword: keyWord},
                    success: function(response){

                        if (response == 'does not exit'){
                            $errors.find("p").hide();
                            $errors.children("p").eq(2).show();
                        }else{
                            var data = {
                                fullName: response,
                                email: keyWord
                            }
                            $errors.find("p").hide();
                            $errors.children("p").eq(3).show();

                            $listStaff.prepend(Mustache.render($templateStaffItem, data));
                        }

                    }
                });
            }

        }
    });



});

function isEmailOnList(email, $listStaff){
    var oke = 0;
    $listStaff.find('.email-item').each(function() {
        if ($(this).text() == email)
            oke = 1;
    });

    return oke;
}

function searchEmail($searchEmail){

    $searchEmail.keyup(function(){
        var keyWord = $(this).val();
        var length_min = 0;

        if (keyWord.length > length_min){
            $.ajax({
                url: 'ajax/load-email.php',
                type: 'POST',
                dataType: 'json',
                data: {keyword:keyWord},
                success:function(data){
                    $searchEmail.autocomplete({
                        source: data
                    });
                }
            });
        }

    });

}