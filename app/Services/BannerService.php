<?php

namespace EasyShop\Services;

use EasyShop\Repositories\BannerRepository\BannerRepositoryInterface;
use File;
use Image;
use EasyShop\Models\Banner;

class BannerService
{

    /**
     * @var
     */
    protected $imageService;

    /**
     *
     */
    protected $bannerRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->imageService = new ImageService();
    }

    /**
     * @param $bannerId
     * @return string
     */
    public function getbannerImageDir($bannerId)
    {
        return public_path() . '/uploads/banners/' . $bannerId . '/';
    }

    /**
     * @description
     * Get all categories for banners
     */
    public function loadBannerCategoryTreeData()
    {
        return $this->bannerRepository->getAllCategories();
    }
    /**
     * Save banner's main image
     *
     * @param UploadedFile $file
     * @param $bannerId
     * @return array
     */
    function saveMainImage($file, $bannerId, $category_banner, $type)
    {
        $image_config = config( 'clients.' . config( 'app.client') . '.' . str_slug($category_banner) . 'BannerMaxWidth');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        if ($type == 'web') {
            $image = Image::make($file->getRealPath());
            $image = $this->imageService->crop($image, $image_config['lg']['width'], $image_config['lg']['height']);
            $image->save(public_path() . '/uploads/banners/' . $bannerId . '/' . 'lg_' . $filename, 80);
            $image->destroy();
            $image = Image::make($file->getRealPath());
            $image = $this->imageService->crop($image, $image_config['md']['width'], $image_config['md']['height']);
            $image->save(public_path() . '/uploads/banners/' . $bannerId . '/' . 'md_' . $filename, 80);
            $image->destroy();
        } else {
            $image = Image::make($file->getRealPath());
            $image = $this->imageService->crop($image, $image_config['mob']['width'], $image_config['mob']['height']);
            $image->save(public_path() . '/uploads/banners/' . $bannerId . '/' . 'mob_' . $filename, 80);
            $image->destroy();
        }

        return ['filename' => $filename];
    }

    /**
     * Save banner's mobile image
     *
     * @param UploadedFile $file
     * @param $bannerId
     * @return array
     */
    function saveMobileImage($file, $bannerId, $category_banner)
    {
        $image_config = config( 'clients.' . config( 'app.client') . '.' . str_slug($category_banner) . 'BannerMaxWidth');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file->getRealPath());
        $image = $this->imageService->crop($image, $image_config['mob']['width'], $image_config['mob']['height']);
        $image->save(Banner::imagePath($bannerId) . 'md_' . $filename, 80);
        $image->destroy();

        return ['filename' => $filename];
    }
}
