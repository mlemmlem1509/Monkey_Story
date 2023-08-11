<?php

namespace App\Repositories\ImageRepository;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class ImageRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Image::class;
    }
}
