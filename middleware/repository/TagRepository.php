<?php

declare(strict_types=1);

namespace middleware\repository;

use middleware\entity\TagEntityInterface;

class TagRepository implements TagRepositoryInterface {

    /**
     * @var integer
     */
    private int $lastId = 0;

    /**
     * @var array
     */
    private array $data = [];

    /**
     * @return integer
     */
    public function generateId(): int
    {
        $this->lastId++;

        return $this->lastId;
    }

    /**
     * @param TagEntityInterface $tag
     */
    public function save(TagEntityInterface $tag)
    {
        $this->data[$tag->getId()] = $tag;
    }

    /**
     * @param integer $id
     * @return TagEntityInterface|null
     */
    public function findById(int $id): TagEntityInterface|null
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->data;
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        if (is_null($this->findById($id))) {
            return false;
        }

        unset($this->data[$id]);

        return true;
    }
}
