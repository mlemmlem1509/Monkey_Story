<?php

namespace App\Repositories\TextRepository;

use App\Models\Text;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class TextRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return Text::class;
    }
}
