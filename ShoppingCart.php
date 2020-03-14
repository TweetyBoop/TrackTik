<?php
/**
 * Created by PhpStorm.
 * User: tanyalamontagne
 * Date: 2020-03-13
 * Time: 11:47 PM
 */

class ShoppingCart
{
    private $items = [];

    private $subtotal = 0;

    private $total = 0;

    private $totalTaxes = 0;

    private $taxRateQST = 9.995;

    private $taxRateGST = 5.00;

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     */
    public function setSubtotal(float $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return float
     */
    public function getTotalTaxes(): float
    {
        return $this->totalTaxes;
    }

    /**
     * @param float $totalTaxes
     */
    public function setTotalTaxes(float $totalTaxes): void
    {
        $this->totalTaxes = $totalTaxes;
    }

    /**
     * @return float
     */
    public function getTaxRateQST(): float
    {
        return $this->taxRateQST;
    }

    /**
     * @return float
     */
    public function getTaxRateGST(): float
    {
        return $this->taxRateGST;
    }

    /**
     * @param ElectronicItem $item
     */
    public function addItem(ElectronicItem $item): void
    {
        array_push($this->items, $item);
    }
}