<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Services\BlogService;
use Illuminate\Http\Request;
use EasyShop\Models\Category;
use EasyShop\Models\Posts;
use EasyShop\Models\PostCategory;
use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\BlogRepository\BlogRepositoryInterface;
use File;
use Image;
use Datatables;
use Auth;
use URL;

class BlogController extends Controller
{
    /**
     * @var $categoryRepository
     */

    protected $categoryRepository;
    /**
     * @var $categoryService
     */
    protected $categoryService;

    /**
     * @var $blogService
     */
    protected $blogService;

    protected $blogRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository,
                                CategoryService $categoryService,
                                BlogService $blogService,
                                BlogRepositoryInterface $blogRepository)
    {  
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
        $this->blogRepository = $blogRepository;
    }

    /**
     * List of blogs
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForPosts($this->categoryService->loadCategoryTreeData(), array(),'list_posts');
    	return view('admin.blog.index', compact('categires_html'));
    }

    /**
     * Add new blog
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {	
    	$categories = $this->categoryRepository->getAll('order');
        $post = new Posts();
        $post->new_from = date('Y-m-d H:i:s'); // Default values for date plugin
        $post->new_to = date('Y-m-d H:i:s'); // Default values for date plugin
        $post->visits = 0;
        $category = new Category();
        $post_id = 0;
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForPosts($this->categoryService->loadCategoryTreeData(), array(),'list_posts');
        $languages = config( 'clients.' . config( 'app.client') . '.languages');
        if (is_null($languages)) {
            $languages["lang1"] = [

                'active' => true,

                'locale' => 'mk',

                'url_segment' => '/',

                'name' => 'Македонски'

            ];
        }
    	return view('admin.blog.add', compact('post_id','post','category','categires_html', 'languages'));
    }

    /**
     * Show blog
     *
     * @param $post_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($post_id)
    {
        $selected_categories = [];
        $categories = $this->categoryRepository->getAll('order');
        $post = Posts::where('id',$post_id)->first();
        $category = new Category();
        if ($post_id) {
            $tmp = PostCategory::where('post_id', $post_id)->select('category_id')->get();
            foreach ($tmp as $v) {
                $selected_categories[] = $v->category_id;
            }
        }
        $languages = config( 'clients.' . config( 'app.client') . '.languages');
        if (is_null($languages)) {
            $languages["lang1"] = [

                'active' => true,

                'locale' => 'mk',

                'url_segment' => '/',

                'name' => 'Македонски'

            ];
        }

//        $categires_html =  $this->categoryService->htmlOptionsFromArrayForPosts($this->categoryService->loadCategoryTreeData(), array(),'list_posts');
        $categires_html = $this->blogRepository->setCategoriesHtml($categories, $selected_categories, $start = 0, $parentsDisabled = true);
        return view('admin.blog.add', compact('post_id','post','languages','category','selected_categories','categires_html'));

    }

    /**
     * Save the blog post
     *
     * @param Requests\AdminPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(\EasyShop\Http\Requests\AdminPostRequest $request)
    {
    	$id = $request->input('post_id');

        if (empty($id)) {
            $post = new Posts();            
        } else {
            $post = Posts::where('id', $id)->first();
        }

        //***********************
        // GENERAL
        //***********************
        $post->title = $request->input('title');
        $post->title_lang2 = $request->input('title_lang2');
        $post->url = $request->input('url');
        $post->url_lang2 = $request->input('url_lang2');
        $post->short_description = $request->input('short_description');
        $post->short_description_lang2 = $request->input('short_description_lang2');
        $post->description = $request->input('description');
        $post->description_lang2 = $request->input('description_lang2');
        $new_from = $request->input('new_from');
        $post->publish_at = date('Y-m-d H:i:s', strtotime($new_from));
        // Flags
        $post->active = $request->input('active', 0);
        //*****************
        // Meta Information
        //*****************
        $post->meta_title = $request->input('meta_title');
        $post->meta_keywords = $request->input('meta_keywords');
        $post->meta_description = $request->input('meta_description');
        $post->meta_description_lang2 = $request->input('meta_description_lang2');
        $post->slider = $request->input('slider', 0);
        $post->slider = $request->input('slider', 0);
        $post->is_recommended = $request->input('is_recommended', 0);
        $post->user_id = Auth::user()->id;
        //$post->visits = $request->input('visits');
        $post->save();


        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $this->categoryRepository->deleteForPost($post->id);
            foreach ($categories as $val) {
                $pc = new PostCategory();
                $pc->category_id = $val;
                $pc->post_id = $post->id;
                $pc->save();
            }
        }


        // upload image
        $file = $request->file('image');
        
        if (!empty($file)) {
            // TODO: move this in separate function
            if (!File::isDirectory(public_path() . '/uploads/posts/' . $post->id)) {
                File::makeDirectory(public_path() . '/uploads/posts/' . $post->id, 0775);
            }

            $data = $this->blogService->saveMainImage($file, $post->id);
            $post->image = $data['filename'];
            $post->save();
        }
        
        return redirect()->route('admin.blog');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getPosts(Request $request)
    {

        $category = $request->get('category');
        $from = $request->get('new_from');

        $posts = Posts::select('posts.id','posts.title','categories.title as name','users.first_name','posts.url','publish_at','posts.active as active')
            ->leftJoin('post_category','posts.id','=','post_category.post_id')                
            ->leftJoin('categories','categories.id','=','post_category.category_id')
            ->leftJoin('users','users.id','=','posts.user_id');

        if(!empty($category) && $category!='all'){
            $posts->where('category_id',$category);
        }

        if(!empty($from)){
            $from = date('Y-m-d H:i:s', strtotime($from));
            //$posts->where('new_from','>=',$from)->where('new_to','<=',$to);
        }

        return Datatables::of($posts)
            ->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/blog/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши" data-id="{{ $id }}" data-blog-delete="">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            ->removeColumn('id')
            ->make();
    }


    /**
     * Upload files for the description
     *
     * @return array
     */
    public function uploadRedactor(Request $request)
    {
        if (!File::isDirectory(public_path() . '/uploads/redactor_blogs')) {
            File::makeDirectory(public_path() . '/uploads/redactor_blogs', 0775);
        }

        if (!$request->hasFile('file')) {
            return response()->json(array('error' => 1), 400);
        }

        $file = $request->file('file');
        $destinationPath = 'uploads/redactor_blogs';
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);
        return array('success' => 1, 'url' => URL::to("$destinationPath") . '/' . $filename);
    }

    public function removeRedactor(Request $request)
    {
        $image = $request->get('src');
        list($a, $b) = explode('/uploads/', $image);
        $image = "uploads/".$b;
        
        File::delete($image);
    }

    public function delete($id = NULL)
    {
        $blog = Posts::destroy($id);
        return redirect()->route('admin.blog')->withSuccess('Успешно избришан блог.');
    }
}
