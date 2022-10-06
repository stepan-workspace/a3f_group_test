<?php

declare(strict_types=1);

namespace middleware\entity;

interface TagEntityInterface {

    /**
     * @param integer $id
     */
    public function setId(int $id);

    /**
     * @return integer
     */
    public function getId(): int;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getName(): string;
}
