<?php

class Electronicitems extends ElectronicItem
{
    /**
     * @var array
     */
    private $items = array();

    /**
     * Electronicitems constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function getSortedItems()
    {
        $sorted = array();
        $count = 0;
        foreach ($this->items as $item) {
            $sorted[$item->price + $count] = $item;
            $count++;
        }
        ksort($sorted, SORT_NUMERIC);
        return $sorted;
    }

    /**
     *
     * @param string $type
     * @return array
     */
    public function getItemsByType($type)
    {
        if (in_array($type, ElectronicItem::$types)) {
            $callback = function ($item) use ($type) {
                return $item->type == $type;
            };
            return array_filter($this->items, $callback);
        }
        return false;
    }


    /**
     * @param $subtotal
     * @param $tax
     * @return float
     */
    public function getTotalWithTaxAndTaxType($subtotal, $tax)
    {
        $amount = round($subtotal * ($tax / 100), 2);
        return $amount;
    }
}

