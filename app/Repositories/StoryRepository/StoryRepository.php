<?php

namespace App\Repositories\StoryRepository;

use App\Models\Story;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class StoryRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return Story::class;
    }
}
