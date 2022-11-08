<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use EasyShop\Models\Category;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\PostCategory;
use Response;
use File;
use URL;
use Validator;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Services\CategoryService;
use EasyShop\Services\PageService;
use EasyShop\Http\Requests\AdminCategoryRequest;
use EasyShop\Models\Sticker;
use DB;

class CategoriesController extends Controller
{
    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepository;

    /**
     *
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var PageService
     */
    protected $pageService;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository,
        PageService $pageService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->pageService = $pageService;
        $this->articleRepository = $articleRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {

        $pageData = $this->pageService->getCategoryPageData();

        $categories = $this->categoryRepository->getAll($orderBy = 'order');
        $category = new Category();
        $category_id = 0;
        $parent_categories = $this->categoryService->listCategoryCategories($this->categoryService->loadCategoryTreeData());
        $nestedList = $this->categoryService->nestedListForCategories($this->categoryService->loadCategoryTreeData());
        $stickers = Sticker::whereNotNull('name')->get();

        $languages = config( 'clients.' . config( 'app.client') . '.languages');
        
        return view('admin.categories.index', compact('pageData', 'categories', 'category', 'category_id', 'nestedList', 'parent_categories', 'languages', 'stickers'));
    }

    /**
     * Show selected category
     *
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $active_childrens = count($this->categoryRepository->getActiveChildren($id, 'order'));
        $category = $this->categoryRepository->getById($id);
        if (!$category) {
            return redirect()->route('admin.categories')->withError('Category does not exist!');
        }

        $categories = $this->categoryRepository->getAll($orderBy = 'order');
        $category_id = $id;
        $nestedList = $this->categoryService->nestedListForCategories($this->categoryService->loadCategoryTreeData());
        $parent_categories = $this->categoryService->listCategoryCategories($this->categoryService->loadCategoryTreeData());
        $stickers = Sticker::whereNotNull('name')->get();

        $languages = config( 'clients.' . config( 'app.client') . '.languages');

        if (is_null($languages)) {

            $languages["lang1"] = [


                'active' => true,


                'locale' => 'mk',


                'url_segment' => '/',


                'name' => 'Македонски'


            ];
        }

        return view('admin.categories.index', compact('category', 'categories', 'category_id', 'nestedList', 'parent_categories', 'active_childrens', 'stickers', 'languages'));
    }

    /**
     * Delete category
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->getById($id);

        if (is_null($category)) {
            return redirect()->back()->withError('Категоријата што сакате да ја избришете не постои.');
        }

        DB::table('products')->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
            ->where('product_category.category_id', $id)->update(['products.sticker_id' => null]);

        $postc = PostCategory::where('category_id', $id)->count();
        $prodc = ProductCategory::where('category_id', $id)->count();
        $catc  = Category::where('parent', $id)->count();
        if ($postc > 0 || $prodc > 0 || $catc > 0) {
            return redirect()->back()->withError('Категоријата што сакате да ја избришете не е празна.');
        }
        // Transfer all product to the parent category
        $affectedRows = 0;
        if (!is_null($category->parent)) {
            $affectedRows = $this->articleRepository->changeArticlesCategory($category->id, $category->parent);
        }

        if ($affectedRows > 0) {
            $message = 'Категоријата е успешно избришана. Продуктите поврзани со оваа категорија се преместени едно ниво погоре.';
        } else {
            $message = 'Категоријата е успешно избришана.';
        }

        $this->categoryRepository->deleteById($id);

        // TODO: Refresh categories cache

        return redirect('admin/categories')->withSuccess($message);
    }


    /**
     * @param AdminCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminCategoryRequest $request)
    {

        $categoryId = $request->input('category_id');

        $category = new Category();

        // Get category for edit
        if (!empty($categoryId)) {
            $category = $this->categoryRepository->getById($categoryId);

            if (is_null($category)) {
                return redirect()->route('admin.categories')->withError('Category not found!');
            }
        } else {
            $category->image = '';
        }

        // Set parent category
        $parent = $request->input('parent');
        if (!empty($parent)) {
            $category->parent = $parent;
            $check_parent_products = ProductCategory::where('category_id', $parent)->count();
            if ($check_parent_products)
                return redirect()->route('admin.categories')
                    ->withError('Одбраната категоријата родител содржи продукти и новата категорија неможе да биде подкатегорија на неа');
        }

        $category->title = $request->input('title');
        $category->title_lang2 = $request->input('title_lang2');
        $category->url = str_slug($request->input('url'));
        $category->url_lang2 = str_slug($request->input('url_lang2'));
        $category->description = $request->input('description');
        $category->description_lang2 = $request->input('description_lang2');
        
        if (is_null($category->id)) {
            $category->order = $this->categoryRepository->getNextOrder($category->parent);
        }
        $category->type = $request->input('type'); // For now it will be hardcoded $request->input('type');
        $category->active = $request->input('active');
        $category->main_category = $request->input('main_category');
        $category->meta_title = $request->input('meta_title');
        $category->meta_title_lang2 = $request->input('meta_title_lang2');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->meta_description_lang2 = $request->input('meta_description_lang2');

        if (isset($category->id) && !is_null($category->id)) {

            if ($request->has('sticker')) {
                $category->sticker_id = $request->input('sticker');
            }


            if ($request->has('sticker')) {
                DB::table('products')->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                    ->where('product_category.category_id', $category->id)->update(['products.sticker_id' => $category->sticker_id]);
            } else {
                DB::table('products')->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')
                    ->where('product_category.category_id', $category->id)->update(['products.sticker_id' => null]);
            }
        }

        $category->active = $request->input('active', 0);

        if (empty($category->main_category))
            $category->main_category = 0;

        $category->save();

        // Upload image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = \Image::make($request->file('image'));
            $imageName = uniqid() . '.jpg';
            //            dd($image);
            $image->save(public_path(Category::$uploadsPath . '/' . $imageName), 90);

            // Delete previous category image
            if (!is_null($category->image)) {
                @unlink(public_path(Category::$uploadsPath . '/' . $category->image));
            }

            // Save new image
            $category->image = $imageName;
            $category->save();
        }

        // TODO: Refresh categories cache

        return redirect()->route('admin.categories')->withSuccess('Категоријата е успешно зачувана.');
    }

    /**
     * Ajax - reorder categories
     *
     * @param Request $request
     */
    public function postReorder(Request $request)
    {
        $currentItem = $request->input('currentItem');
        $itemParent = $request->input('itemParent', NULL);
        $positions =  $request->input('positions', []);
        $force =  $request->input('force', 0);

        if ($force > 0) {

            $pc = ProductCategory::where('category_id', $itemParent)->get();
            foreach ($pc as $key => $value) {
                $value->category_id = $currentItem;
                $value->save();
            }
            return response()->json([
                'status' => 'success'
            ]);
        }

        $postc = PostCategory::where('category_id', $itemParent)->count();
        $prodc = ProductCategory::where('category_id', $itemParent)->count();
        $catc  = Category::where('parent', $currentItem)->count();

        if ($postc > 0 || $prodc > 0 || $catc > 0) {
            return response()->json([
                'status' => 'error',
                'text'   => 'Категоријата родител не е празна'
            ]);
        }

        $category_data = Category::where('id', $currentItem)->first();
        $this->categoryRepository->updateOrders($currentItem, $itemParent, $positions);
        if ($itemParent != $category_data->parent) {
            $i = 0;
            $categories = Category::where('parent', $category_data->parent)->orderby('order')->get();
            foreach ($categories as $cat) {
                $cat->order = $i;
                $cat->save();
                $i = $i + 1;
            }
        }
        // TODO: Refresh categories cache
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function uploadRedactor()
    {
        if (!File::isDirectory(public_path() . '/uploads/redactor_categories')) {
            File::makeDirectory(public_path() . '/uploads/redactor_categories', 0775);
        }

        if (!Input::hasFile('file')) {
            return Response::json(array('error' => 1), 400);
        }

        $file = Input::file('file');
        $destinationPath = 'uploads/redactor_categories';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);
        return array('success' => 1, 'url' => URL::to("$destinationPath") . '/' . $filename);
    }




    public function removeRedactor(Request $request)
    {
        $image = $request->get('src');
        list($a, $b) = explode('/uploads/', $image);
        $image = "uploads/" . $b;

        File::delete($image);
    }
}
