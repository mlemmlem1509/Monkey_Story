<?php

namespace App\Repositories\PageContentRepository;

use App\Models\PageContent;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class PageContentRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return PageContent::class;
    }
}
