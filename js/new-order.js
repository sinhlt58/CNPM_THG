$(document).ready(function () {


    //=============================*NEW ORDERS*===================================

    //Set up.
    //chon cac tag cot ben trai.
    var $saveOrder = $('#save-order');
    var $btnSaveOrder = $saveOrder.find('#btn-save-order');
    var $bodySaveOrder = $saveOrder.find('#body-save-order');
    var templateItemOnSaveOrder = $('#template-item-on-save-order').html();
    var $totalAmountPrice = $bodySaveOrder.find('#total-amount-price');
    var totalAmountPrice = 0;//bien tong tang len thut xuong lien tuc.

    //chon cac tag cot ben phai.
    var $chooseItems = $('#choose-items');
    var $itemOnChooseOrder = $chooseItems.find('.item-on-choose-order');

    //an nut Save.
    $btnSaveOrder.hide();

    //chon item.
    chooseItem();

    //giam item.
    decreaseItem();

    //Lay du lieu tu nut save va day len server.
    pushOrder();

    //Chon ban.
    var $inputTableNumber = $saveOrder.find('#input-table-number');
    var $tableNumber = $saveOrder.find('#table-number');
    chooseTable($inputTableNumber, $tableNumber);

    //Tool tips.

    //Functions.
    function changeAmountAndPrice($tagAmount, $tagPrice, itemAmount, itemPrice) {
        $tagAmount.attr('item-amount', itemAmount);
        $tagAmount.html(itemAmount);
        $tagPrice.attr('item-price', itemPrice);
        $tagPrice.html(itemPrice + '$');
    }

    function totalPrice(pricePerItem) {
        totalAmountPrice = totalAmountPrice + pricePerItem;
        $totalAmountPrice.html(totalAmountPrice + '$');//dat lai gia tri.
        $totalAmountPrice.attr('total-price', totalAmountPrice);
    }

    function pushOrder() {
        $saveOrder.delegate('#btn-save-order', 'click', function () {
            var userFullName = $saveOrder.attr('user-full-name');
            var valueTable = $inputTableNumber.val(); //lay ban.
            var totalPrice = $totalAmountPrice.attr('total-price');//lay tong tien.
            var restaurantId = $(this).attr('restaurant-id'); //lay id restaurant.
            var listItemId = [];//lay id cac mon an.
            var listItemAmount = [];//lay amount cac mon an tuong ung voi id.
            $bodySaveOrder.find('[item-id]').each(function () {
                var itemId = $(this).attr('item-id');
                var itemAmount = $(this).find('[item-amount]').attr('item-amount');

                listItemId.push(itemId);
                listItemAmount.push(itemAmount);
            });
            //day len server.
            var url = 'ajax/new-order.php';
            var data = {
                userFullName: userFullName,
                valueTable: valueTable,
                totalPrice: totalPrice,
                restaurantId: restaurantId,
                listItemId: listItemId,
                listItemAmount: listItemAmount
            }
            $.ajax({
                type: 'POST',
                url: url,
                data: data
            });

            var href = 'http://localhost/THG/order';
            //doi 1/2 giay roi moi doi trang khong thi khong load kip du lieu :)).
            //hic mai moi nghi ra duoc hohoho.
            setTimeout(function(){
                window.location.href = href;
            }, 500);

        });
    }

    function chooseItem() {
        //mot trong cac mon an duoc click.
        $itemOnChooseOrder.on('click', function () {
            $btnSaveOrder.fadeIn(500);//hien nut Save cot ben trai.

            //Lay cac gia tri can cua thuc an.
            var itemName = $(this).attr('item-name');
            var itemPriceBase = $(this).attr('item-price');
            var itemId = $(this).attr('item-id');

            //cong don vao tong tien.
            totalPrice(parseInt(itemPriceBase));

            //lay gia tri true hoac false de kiem trac item co trong bang save order chua.
            var $isContentItem = $bodySaveOrder.find("[item-id]").is("[item-id=" + itemId + "]");

            //kiem tra itemId co trong bodySaveOrder khong.(tuc la cai item chon da co trong cot ben trai chua)
            if (!$isContentItem) {//Neu chua co thi them vao voi itemAmout = 1.
                var item = {
                    itemName: itemName,
                    itemPrice: itemPriceBase,
                    itemId: itemId,
                    itemAmount: 1
                }
                //them 1 hang tuong ung voi item do vao bodySaveOrder.
                $bodySaveOrder.prepend(Mustache.render(templateItemOnSaveOrder, item));

            } else {//Neu co roi thi lay gia tri item-amout sau do tang len 1 tiep do dat lai gia tri.

                var $focusItem = $bodySaveOrder.find("[item-id=" + itemId + "]");//chon hang ung voi id.
                var $tagAmount = $focusItem.find("[item-amount]");//chon tag chua attribute item-amount.
                var itemAmount = $tagAmount.attr('item-amount');//lay gia tri tu attribute item-amount.
                var $tagPrice = $focusItem.find("[item-price]");
                var itemPrice = $tagPrice.attr('item-price');

                var pricePerItem = itemPrice / itemAmount;

                itemAmount++;//tang so luong len 1.
                itemPrice = pricePerItem * itemAmount;//tinh tien ung voi so luong.

                //dat lai gia tri.
                changeAmountAndPrice($tagAmount, $tagPrice, itemAmount, itemPrice);
            }

        });
    }

    function decreaseItem() {
        //giam so luong thuc an nao! :))))))))).
        $bodySaveOrder.delegate('.subtract-amount-item', 'click', function () {
            var $focusItem = $(this).closest('[item-id]');
            var $tagAmount = $focusItem.find('[item-amount]');
            var itemAmount = $tagAmount.attr('item-amount');
            var $tagPrice = $focusItem.find("[item-price]");
            var itemPrice = $tagPrice.attr('item-price');

            var pricePerItem = itemPrice / itemAmount;

            //tru don vao tong tien.
            totalPrice(-parseInt(pricePerItem));

            if (itemAmount == 1) {
                //xoa item ay di.
                $focusItem.remove();
                //new khong con item nao thi an nut Save di.
                if (!$bodySaveOrder.find('[item-id]').is('[item-id]')) {
                    $btnSaveOrder.fadeOut(500);
                }
            } else {
                //giam di 1.
                itemAmount--;
                itemPrice = pricePerItem * itemAmount;//tinh tien ung voi so luong.

                //dat lai gia tri.
                changeAmountAndPrice($tagAmount, $tagPrice, itemAmount, itemPrice);
            }
        });
    }

    function chooseTable($inputTableNumber, $tableNumber) {

        

        $tableNumber.on('click', function () {
            $inputTableNumber.show().focus();//hien input.
        });

    }

    //=============================*END NEW ORDERS*===============================

});