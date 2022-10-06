<?php

declare(strict_types=1);

namespace middleware\entity;

class TagCounteEntity implements TagCountEntityInterface {

    /**
     * @var integer $id
     */
    private int $id;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var integer $count
     */
    private int $count;

    /**
     * @param integer $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param integer $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return integer
     */
    public function getCount(): int
    {
        return $this->count;
    }
}