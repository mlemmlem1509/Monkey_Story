<?php

namespace App\Repositories\PageRepository;

use App\Models\Page;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class PageRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return Page::class;
    }
}
