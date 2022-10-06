<?php

declare(strict_types=1);

namespace middleware;

use middleware\DTO\UrlDTOInterface;

class ParseUrlService {

    /**
     * @param UrlDTOInterface
     */
    public function __construct(
        private UrlDTOInterface $urlDTO
    ) {}

    /**
     * @return array
     */
    public function execute(): array
    {
        $result = [];

        if (empty($this->urlDTO->getUrl())) {
            return $result;
        }

        try {    
            $content = file_get_contents($this->urlDTO->getUrl());
            preg_match_all("/<([\w]+)[^>]*>/", $content, $data);
            $result = end($data);
        } catch (mixed $e) {
            echo "Ошибка. Не удалось обработать страницу.";
        } finally {
            return $result;
        }
    }
}
