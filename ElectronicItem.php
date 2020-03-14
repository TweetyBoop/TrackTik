<?php
/**
 * Created by PhpStorm.
 * User: tanyalamontagne
 * Date: 2020-03-10
 * Time: 4:50 PM
 */

class ElectronicItem
{
    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';
    /**
     * @var array
     */
    protected static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER);
    /**
     * The ElectronicItem's identifying name
     * @var string
     */
    public $itemName;
    /**
     * The ElectronicItem's Price, can be with decimal
     * @var float
     */
    public $price;
    /**
     * The ElectronicItem's true or false variable for if it is wired
     * @var boolean
     */
    public $wired;
    /**
     * The ElectronicItem's extras such as ports or controllers, etc...
     * @var array
     */
    public $extras;
    /**
     * The ElectronicItem's max number of extras that are allowed, which can be different for each item
     * @var integer
     */
    public $maxExtras;
    /**
     * The ElectronicItem's type, would be one of the constants defined in this file
     * @var string
     */
    protected $type;

    /**
     * ElectronicItem constructor.
     * @param $itemName
     * @param $type
     * @param $maxExtras
     * @param $price
     * @param $wired
     * @param array $extras
     */
    public function __construct($itemName, $type, $price, $wired)
    {
        $this->itemName = $itemName;
        $this->type = $type;
        $this->maxExtras = $this->setMaxExtras();
        $this->price = $price;
        $this->wired = $wired;
        $this->extras = [];
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @param string $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }


    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getTypes()
    {
        return self::$types;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function getWired()
    {
        return $this->wired;
    }

    /**
     * @param $wired
     */
    public function setWired($wired)
    {
        $this->wired = $wired;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    /**
     * @param $extra
     */
    public function addExtraItem($extra)
    {
        if (($this->getMaxExtras() < 0) || ($this->getMaxExtras() >= (count($this->extras) + 1))) {
            array_push($this->extras, $extra);
        }
    }

    /**
     * @return int
     */
    public function getMaxExtras()
    {
        return $this->maxExtras;
    }

    /**
     * @param int $maxExtras
     */
    public function setMaxExtras()
    {
        switch ($this->type) {
            case ElectronicItem::ELECTRONIC_ITEM_CONSOLE:
                return $this->maxExtras = 4;
                break;
            case ElectronicItem::ELECTRONIC_ITEM_MICROWAVE:
                return $this->maxExtras = 0;
                break;
            case ElectronicItem::ELECTRONIC_ITEM_TELEVISION:
                return $this->maxExtras = -1;
                break;
            case ElectronicItem::ELECTRONIC_ITEM_CONTROLLER:
                return $this->maxExtras = 0;
                break;
            default:
                break;
        }
    }

    public function displayCreatedItem(){
        return '<strong>'.$this->getItemName().'</strong>';
    }
}

