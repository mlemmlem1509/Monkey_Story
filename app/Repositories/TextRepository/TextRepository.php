<?php

namespace App\Repositories\TextRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class TextRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Text::class;
    }
}
