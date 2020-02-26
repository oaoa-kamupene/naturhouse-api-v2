<?php


namespace Naturhouse\Entities;


class ContactTime extends BaseEntity
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $text;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param int $id
     * @return ContactTime
     */
    public function setId(int $id): ContactTime
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $text
     * @return ContactTime
     */
    public function setText(string $text): ContactTime
    {
        $this->text = $text;
        return $this;
    }

}