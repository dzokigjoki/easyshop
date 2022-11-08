<?php namespace EasyShop\Repositories\BlogRepository;

use DB;
use Carbon\Carbon;
use EasyShop\Models\Posts;

class DBBlogRepository implements BlogRepositoryInterface {


    /**
     * Find blog by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Posts::find($id);
    }

    /**
     * Get blogs pagination
     *
     * @param $perPage 
     * @return mixed
     */
    public function getAll($perPage = 6) {
        $dtNow = Carbon::now();

        return Posts::active()
            ->where('publish_at', '<', $dtNow)
            ->select('image', 'title', 'publish_at', 'short_description', 'url', 'id', 'visits')
            ->orderBy('publish_at', 'DESC')
            ->paginate($perPage);
    }

    public function getLatest($count = 4)
    {
        switch (config( 'app.client')){
            case 'bloomtea':
                return Posts::active()->orderBy('publish_at', 'DESC')->take(2)->get();
            default:
                return Posts::active()->orderBy('publish_at', 'DESC')->take($count)->get();

        }
    }

    /**
     * Increment visits of a blog
     *
     * @param $id
     * @return mixed
     */
    public function incrementVisits($id)
    {
        DB::table('posts')->where('id', '=', $id)->increment('visits');
    }

    /**
     * Get last blog item from category
     *
     * @param $categoryId
     * @return mixed
     */
    public function getLastFromCategory($categoryId)
    {
        return DB::table('posts')
            ->join('post_category', 'posts.id', '=', 'post_category.post_id')
            ->where('post_category.category_id', '=', $categoryId)
            ->where('posts.active', '=', 1)
            ->whereNull('posts.deleted_at')
            ->select('posts.id', 'posts.title', 'posts.url', 'posts.short_description', 'posts.image')
            ->orderBy('posts.id', 'DESC')
            ->first();
    }

    /**
     * Get filtered products for category
     *
     * @param int $categoryId
     * @return mixed
     */
    public function getFilteredPostsPagination($categoryId, $paginate = 20)
    {
        return DB::table('posts')
            ->join('post_category', 'posts.id', '=', 'post_category.post_id')
            ->where('post_category.category_id', '=', $categoryId)
            ->where('posts.active', '=', 1)
            ->whereNull('posts.deleted_at')
            ->select('posts.id', 'publish_at', 'posts.title', 'posts.url', 'posts.short_description', 'posts.image', 'posts.created_at', 'posts.visits')
            ->orderBy('posts.publish_at', 'DESC')
            ->paginate($paginate);
    }

    public function getNewest($count = 3)
    {
        return DB::table('posts')
            ->where('posts.active', '=', 1)
            ->whereNull('posts.deleted_at')
            ->select('posts.image', 'posts.title', 'posts.created_at', 'posts.short_description', 'posts.url', 'posts.id', 'posts.visits')
            ->orderBy('posts.publish_at', 'DESC')
            ->limit($count)
            ->get();
    }
    public function setCategoriesHtml($array, $selected_ids, $start = 0, $parentsDisabled = true){
        $html = '';
        foreach ($array as $v) {
            if($v->type === 'list_posts'){
                $selected = "";
                if (in_array($v->id, $selected_ids)) {
                    $selected = "selected";
                }
                $temp = "<option {$selected} value='{$v->id}'>".str_repeat('-', $start) . " {$v->title}</option>";
                $html .= $temp;}
            }
        return $html;
    }
}