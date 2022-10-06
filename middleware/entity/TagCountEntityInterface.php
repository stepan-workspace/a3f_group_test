<?php

declare(strict_types=1);

namespace middleware\entity;

interface TagCountEntityInterface {

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param integer $count
     */
    public function setCount(int $count);

    /**
     * @return integer
     */
    public function getCount(): int;
}
