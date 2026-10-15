<?php

namespace Webkul\NativeHouse\ImageTemplates;

use Illuminate\Image\Image;

class ProductCard
{
    /**
     * Crop the image to a portrait product card.
     */
    public function applyFilter(Image $image): Image
    {
        return $image->cover(400, 500);
    }
}