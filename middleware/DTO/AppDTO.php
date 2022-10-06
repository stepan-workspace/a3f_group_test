<?php

declare(strict_types=1);

namespace middleware\DTO;

use middleware\repository\TagRepositoryInterface;
use middleware\repository\TagCountRepositoryInterface;

class AppDTO {

    /**
     * @var UrlDTOInterface $urlDTO
     */
    public UrlDTOInterface $urlDTO;

    /**
     * @var TagRepositoryInterface $tagRepository
     */
    public TagRepositoryInterface $tagRepository;

    /**
     * @var TagCountRepositoryInterface $tagCountRepository
     */
    public TagCountRepositoryInterface $tagCountRepository;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach (get_class_vars(get_class($this)) as $k => $v) {
            if (isset($data[$k])) {
                $this->$k = $data[$k];
            }
        }
    }
}