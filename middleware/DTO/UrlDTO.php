<?php

declare(strict_types=1);

namespace middleware\DTO;

class UrlDTO implements UrlDTOInterface {

    /**
     * @var string $url
     */
    public string $url = '';

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

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}