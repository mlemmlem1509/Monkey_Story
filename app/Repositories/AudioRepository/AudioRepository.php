<?php

namespace App\Repositories\AudioRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class AudioRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Audio::class;
    }
}
