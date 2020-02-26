<?php


namespace Naturhouse\Entities;


class Package extends BaseEntity
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $totalPrice;
    /**
     * @var string
     */
    private $formattedPrice;

    /**
     * Branch constructor.
     * @param array
     */
    public function __construct($data)
    {
        foreach ($data as $key => $val) {
            $method = str_replace('_', '', 'set' . ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($val);
            }
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->formattedPrice;
    }

    /**
     * @param string $formattedPrice
     */
    public function setFormattedPrice($formattedPrice)
    {
        $this->formattedPrice = $formattedPrice;
    }


}