$(document).ready(function(){

    var $addStaff = $("#add-staff");
    var $searchEmail = $("#search-email");
    var $errors = $("#errors");

    $errors.find("p").hide();

    searchEmail($searchEmail);


    $addStaff.on('click', function(){
        var keyWord = $searchEmail.val();

        if (keyWord == ""){
            $errors.children("p").eq(0).show();
        }else{

        }
    });



});
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