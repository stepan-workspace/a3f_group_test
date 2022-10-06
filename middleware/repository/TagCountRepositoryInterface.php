<?php

declare(strict_types=1);

namespace middleware\repository;

use middleware\entity\TagCountEntityInterface;

interface TagCountRepositoryInterface {

    /**
     * @param TagCountEntityInterface $tag
     */
    public function save(TagCountEntityInterface $tag);

    /**
     * @param string $name
     * @return TagCountEntityInterface|null
     */
    public function findByName(string $name): TagCountEntityInterface|null;

    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param string $name
     * @return boolean
     */
    public function delete(string $name): bool;
}
