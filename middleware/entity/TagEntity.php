<?php

declare(strict_types=1);

namespace middleware\entity;

use middleware\entity\TagEntityInterface;

class TagEntity implements TagEntityInterface {

    /**
     * @var integer $id
     */
    private int $id;

    /**
     * @var string $name
     */
    private string $name;

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
}