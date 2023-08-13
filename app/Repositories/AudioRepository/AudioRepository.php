<?php

namespace App\Repositories\AudioRepository;

use App\Models\Audio;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class AudioRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return Audio::class;
    }
}
