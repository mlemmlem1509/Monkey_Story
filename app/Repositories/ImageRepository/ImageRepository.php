<?php

namespace App\Repositories\ImageRepository;

use App\Models\Image;
use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;

class ImageRepository extends BaseRepository implements BaseRepositoryInterface
{
    public function getModel()
    {
        return Image::class;
    }
}
