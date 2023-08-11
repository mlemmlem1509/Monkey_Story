<?php

namespace App\Repositories\StoryRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class StoryRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Story::class;
    }
}
