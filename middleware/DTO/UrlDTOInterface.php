<?php

declare(strict_types=1);

namespace middleware\DTO;

interface UrlDTOInterface {

    /**
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * @return string
     */
    public function getUrl(): string;
}
