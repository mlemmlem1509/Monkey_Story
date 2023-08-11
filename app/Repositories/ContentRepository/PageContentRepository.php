<?php

namespace App\Repositories\PageContentRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class PageContentRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\PageContent::class;
    }
}
