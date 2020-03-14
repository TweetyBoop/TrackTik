<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <?php
        include('ElectronicItem.php');
        include('Electronicitems.php');
        include('ShoppingCart.php');
    ?>

    <title>Tanya Lamontagne - Track Tik</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="Tanya Lamontagne">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<section class="container">
    <h1>TrackTik Exercise</h1>
    <div>
        <h4>Creating Items</h4>
        <?php
            $television1 = new ElectronicItem('TV #1', ElectronicItem::ELECTRONIC_ITEM_TELEVISION, 499.99, true);
            $television2 = new ElectronicItem('TV #2', ElectronicItem::ELECTRONIC_ITEM_TELEVISION, 649.99, true);
            $controller1 = new ElectronicItem('Wireless Controller #1', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 19.99, false);
            $controller2 = new ElectronicItem('Wireless Controller #2', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 19.99, false);
            $controller3 = new ElectronicItem('Wireless Controller #3', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 19.99, false);
            $controller4 = new ElectronicItem('Wireless Controller #4', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 19.99, false);
            $controller5 = new ElectronicItem('Wireless Controller #5', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 19.99, false);
            $controller6 = new ElectronicItem('Wired Controller #1', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 4.99, false);
            $controller7 = new ElectronicItem('Wired Controller #2', ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 4.99, false);
            $console1 = new ElectronicItem('Console #1', ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 349.99, false);
            $microwave1 = new ElectronicItem('Microwave #1', ElectronicItem::ELECTRONIC_ITEM_MICROWAVE, 129.99, false);
        ?>
    </div>
    <div>
        <h4>Adding Extras to Items</h4>
        <?php
            $television1->addExtraItem($controller1);
            $television1->addExtraItem($controller2);
            $television2->addExtraItem($controller3);
            $console1->addExtraItem($controller4);
            $console1->addExtraItem($controller5);
            $console1->addExtraItem($controller6);
            $console1->addExtraItem($controller7);
        ?>
    </div>
    <div style="max-width: 763px">
        <h2>Question 1</h2>
        <hr>
        <h4 style="text-align: center;">
            RECEIPT
        </h4>
        <hr>
        <?php
            $shoppingCart = new ShoppingCart();
            $shoppingCart->setItems([$television1, $television2, $console1, $microwave1]);
            foreach($shoppingCart->getItems() as $item){
                foreach($item->getExtras() as $extra){
                    $shoppingCart->addItem($extra);
                }
            }
            $electronics = new ElectronicItems($shoppingCart->getItems());
            $sorted = $electronics->getSortedItems();
            foreach ($sorted as $item) {
                echo '<span style="float:left;">' . $item->getItemName() . '</span><span style="float:right;">$' .
                    $item->getPrice() . '</span><br />';
                $subtotal = $shoppingCart->getSubTotal() + $item->getPrice();
                $shoppingCart->setSubTotal($subtotal);
            }
            echo '<br />';
            echo '<span style="float:left"></span><span style="float:right;">(Subtotal: $' .
                $shoppingCart->getSubtotal() . ')
            </span><br />';
            echo '<br />';
            echo '<hr>';

            $amountQST = $electronics->getTotalWithTaxAndTaxType($shoppingCart->getSubtotal(), $shoppingCart->getTaxRateQST());
            echo '<span style="float:left"></span><span style="float:right;">QST (9.995%): $' . $amountQST . '</span><br />';
            $shoppingCart->setTotalTaxes($shoppingCart->getTotalTaxes() + $amountQST);
            $amountGST = $electronics->getTotalWithTaxAndTaxType($shoppingCart->getSubtotal(), $shoppingCart->getTaxRateGST());
            echo '<span style="float:left"></span><span style="float:right;">GST (5.00%): $' . $amountGST . '</span><br />';
            $shoppingCart->setTotalTaxes($shoppingCart->getTotalTaxes() + $amountGST);
            echo '<hr>';
            echo '<span style="float:left"></span><span style="float:right;"><strong>TOTAL:</strong> $' .
                round($shoppingCart->getSubtotal() + $shoppingCart->getTotalTaxes(), 2) . '</span><br />';
        ?>
    </div>
    <div style="max-width: 763px">
        <h2>Question 2</h2>
        <hr><h4 style="text-align: center;">RECEIPT</h4><hr>
        <br />
        <?php
        $shoppingCart2 = new ShoppingCart();
        $shoppingCart2->addItem($console1);
        foreach($console1->getExtras() as $extra){
            $shoppingCart2->addItem($extra);
        }
        $electronics = new ElectronicItems($shoppingCart2->getItems());
        $sorted = $electronics->getSortedItems();
        foreach ($sorted as $item) {
            echo '<span style="float:left;">' . $item->getItemName() . '</span><span style="float:right;">$' .
                $item->getPrice() . '</span><br />';
            $shoppingCart2->setSubtotal($shoppingCart2->getSubtotal() + $item->getPrice());
        }
        echo '<br />';
        echo '<span style="float:left"></span><span style="float:right;">(Subtotal: $' . $shoppingCart2->getSubtotal() . ')
</span><br />';
        echo '<br />';
        echo '<hr>';

        $amountQST = $electronics->getTotalWithTaxAndTaxType($shoppingCart2->getSubtotal(), $shoppingCart2->getTaxRateQST());
        echo '<span style="float:left"></span><span style="float:right;">QST (9.995%): $' . $amountQST . '</span><br />';
        $shoppingCart2->setTotalTaxes($shoppingCart2->getTotalTaxes() + $amountQST);
        $amountGST = $electronics->getTotalWithTaxAndTaxType($shoppingCart2->getSubtotal(), $shoppingCart2->getTaxRateGST());
        echo '<span style="float:left"></span><span style="float:right;">GST (5.00%): $' . $amountGST . '</span><br />';
        $shoppingCart2->setTotalTaxes($shoppingCart2->getTotalTaxes() + $amountGST);
        echo '<hr>';
        echo '<span style="float:left"></span><span style="float:right;"><strong>TOTAL:</strong> $' .
            round($shoppingCart2->getSubtotal() + $shoppingCart2->getTotalTaxes(), 2) . '</span><br />';
        ?>
    </div>
</section>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="scripts.js"></script>
</body>
</html>

