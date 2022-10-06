<?php

declare(strict_types=1);

use middleware\DTO\UrlDTO;
use middleware\ParseUrlService;
use middleware\repository\TagRepository;
use middleware\repository\TagCountRepository;
use middleware\entity\TagEntity;
use middleware\entity\TagCounteEntity;
use middleware\DTO\AppDTO;

class App {

    private AppDTO|null $appDTO = null;

    /**
     * @param string $loaderClassName
     * @param string $loaderMethodName
     */
    public function __construct(
        string $loaderClassName,
        string $loaderMethodName
    ) {
        spl_autoload_register([$loaderClassName, $loaderMethodName], true, true);
    }

    public function initialize()
    {
        $urlDTO = new UrlDTO($_GET);
        
        $data = (new ParseUrlService($urlDTO))->execute();

        $tagRepository = new TagRepository();
        foreach ($data as $v) {
            $tagEntity = new TagEntity();
            $tagEntity->setId($tagRepository->generateId());
            $tagEntity->setName($v);
            $tagRepository->save($tagEntity);
        }

        $tagCountRepository = new TagCountRepository();
        foreach ($tagRepository->getAll() as $k => $v) {
            $tagCountEntity = $tagCountRepository->findByName($v->getName());
            if (is_null($tagCountEntity)) {
                $tagCountEntity = new TagCounteEntity();
                $tagCountEntity->setId($v->getId());
                $tagCountEntity->setName($v->getName());
                $tagCountEntity->setCount(0);
            }
            $count = $tagCountEntity->getCount() + 1;
            $tagCountEntity->setCount($count);
            $tagCountRepository->save($tagCountEntity);
        }

        $this->appDTO = new AppDTO([
            'urlDTO' => $urlDTO,
            'tagRepository' => $tagRepository,
            'tagCountRepository' => $tagCountRepository
        ]);
    }

    public function getAppDTO() {
        return $this->appDTO;
    }
}
