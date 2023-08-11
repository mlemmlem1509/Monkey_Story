<?php

namespace App\Repositories\PageRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class PageRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Page::class;
    }
}
