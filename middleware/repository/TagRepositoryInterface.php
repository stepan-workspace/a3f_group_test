<?php

declare(strict_types=1);

namespace middleware\repository;

use middleware\entity\TagEntityInterface;

interface TagRepositoryInterface {

    /**
     * @return integer
     */
    public function generateId(): int;

    /**
     * @param TagEntityInterface $tag
     */
    public function save(TagEntityInterface $tag);

    /**
     * @param integer $id
     * @return TagEntityInterface|null
     */
    public function findById(int $id): TagEntityInterface|null;

    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool;
}
