<?php namespace EasyShop\Services;

class PageService {

    /**
     * Get page data for category view
     *
     * @return array
     */
    public function getCategoryPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Категории',
                ]
            ]
        ];
    }

    /**
     * Get page data for article list view
     *
     * @return array
     */
    public function getArticleListPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Артикли',
                ]
            ]
        ];
    }

    /**
     * Get page data for article create/edit view
     *
     * @return array
     */
    public function getArticleShowPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Артикли',
                    'link' => route('admin.articles'),
                ],
                [
                    'title' => 'Нов Артикал'
                ]
            ]
        ];
    }

    /**
     * Get page data for article create/edit view
     *
     * @return array
     */
    public function getArticleEditPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Артикли',
                    'link' => route('admin.articles'),
                ],
                [
                    'title' => 'Измени артикал'
                ]
            ]
        ];
    }

    /**
     * Get page data for article list view
     *
     * @return array
     */
    public function getManufacturerListPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Производители',
                ]
            ]
        ];
    }

    /**
     * Get page data for manufacturer create/edit view
     *
     * @return array
     */
    public function getManufacturerShowPageData()
    {
        return [
            'title' => 'Каталог',
            'breadcrumbs' => [
                [
                    'title' => 'Дома',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'title' => 'Производители',
                    'link' => route('admin.manufacturers'),
                ],
                [
                    'title' => 'Нов Производител'
                ]
            ]
        ];
    }
}