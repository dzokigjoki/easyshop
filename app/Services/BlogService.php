<?php namespace EasyShop\Services;

use File;
use Image;
use EasyShop\Models\Posts;

class BlogService {

    /**
     * @var
     */
    protected $imageService;

    /**
     *
     */
    public function __construct()
    {
        $this->imageService = new ImageService();
    }

    /**
     * @param $blogId
     * @return string
     */
    public function getBlogImageDir($blogId)
    {
        return public_path() . '/uploads/posts/' . $blogId . '/';
    }

    /**
     * Save blog's main image
     *
     * @param UploadedFile $file
     * @param $productId
     * @return array
     */
    function saveMainImage($file, $blogId) {

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Image LG
        $imageLG = Image::make($file->getRealPath());
        $imageLG = $this->imageService->crop($imageLG, \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'lg', 'width'), \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'lg', 'height'));
        $imageLG->save(Posts::imagePath($blogId) . 'lg_' . $filename, 90);
        $imageLG->destroy();


        // Image MD
        $imageMD = Image::make($file->getRealPath());
        $imageMD = $this->imageService->crop($imageMD, \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'md', 'width'), \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'md', 'height'));
        $imageMD->save(Posts::imagePath($blogId) . 'md_' . $filename, 90);
        $imageMD->destroy();

        // Image SM
        $imageSM = Image::make($file->getRealPath());
        $imageSM = $this->imageService->crop($imageSM, \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'sm', 'width'), \EasyShop\Models\AdminSettings::getDimensions('blogssize', 'sm', 'height'));
        $imageSM->save(Posts::imagePath($blogId) . 'sm_' . $filename, 80);
        $imageSM->destroy();

        return ['filename' => $filename];
    }

}