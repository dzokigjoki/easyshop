<?php

namespace EasyShop\Http\Controllers;

use Doctrine\DBAL\Schema\View;
use EasyShop\Http\Requests;
use EasyShop\Models\Posts;
use EasyShop\Repositories\BlogRepository\BlogRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;
use Auth;
use Illuminate\Http\Request;


class BlogController extends FrontController
{

    /**
     * @var
     */
    protected $blogRepository;
    /**
     * @var
     */
    protected $categoryRepository;

    public function __construct(
        CategoryService $categoryService,
        BlogRepositoryInterface $blogRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        parent::__construct($categoryService);

        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show all blogs
     */
    public function index()
    {
        $perPage = 6;
        $blogs = $this->blogRepository->getAll($perPage);
        $categories = $this->categoryRepository->getAllBlogListing();

        return view('clients.' . config( 'app.theme') . '.blog-list', compact('blogs', 'categories'));
    }

    /**
     * Show blog
     *
     * @param $id
     *
     * @return View
     */
    public function show($id)
    {
        $locale = $this->locale;

        $lang = $this->lang;


        $blog = Posts::getPostsByIdInLang($id, $lang);

        if (is_null($blog) || !$blog->active) {
            abort(404);
        }

        $this->blogRepository->incrementVisits($id);
        $categories = $this->categoryRepository->getAllBlogListing();
        $newest = $this->blogRepository->getNewest();
        $data['metaTags']['description'] = mb_substr(strip_tags($blog->short_description),0,300);
        $data['metaTags']['title'] = $blog->title;
        if($blog->image != NULL)
        {
            $data['metaTags']['image']  = '/uploads/posts/' . $blog->image;
        }
        $data['metaTags']['keywords'] = $blog->meta_keywords;

        $data['blog'] = $blog;
        $data['newest'] = $newest;
        $data['categories'] = $categories;
        return view('clients.' . config( 'app.theme') . '.blog', $data);
    }


}
