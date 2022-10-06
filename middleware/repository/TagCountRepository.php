<?php

declare(strict_types=1);

namespace middleware\repository;

use middleware\entity\TagCountEntityInterface;

class TagCountRepository implements TagCountRepositoryInterface {

    /**
     * @var array
     */
    private array $data = [];

    /**
     * @param TagCountEntityInterface $tag
     */
    public function save(TagCountEntityInterface $tag)
    {
        $this->data[$tag->getName()] = $tag;
    }

    /**
     * @param string $name
     * @return TagCountEntityInterface|null
     */
    public function findByName(string $name): TagCountEntityInterface|null
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
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
     * @param string $name
     * @return boolean
     */
    public function delete(string $name): bool
    {
        if (is_null($this->findByName($name))) {
            return false;
        }

        unset($this->data[$name]);

        return true;
    }
}
