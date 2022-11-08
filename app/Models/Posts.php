<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title', 'unit_id', 'url', 'image', 'short_description', 'description',
        'active', 'publish_at', 'slider', 'is_recommended', 'visits'
    ];


    /**
     * Get the image path
     *
     * @param $blogId - id of the blog
     * @return string
     */
    public static function imagePath($blogId)
    {
        return public_path() . '/uploads/posts/' . $blogId . '/';
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }




    public static function getLatest($count = 5, $lang = "lang1")

    {

        if (

            $lang == 'lang1'

        ) {

            return Posts::active()->orderBy('publish_at', 'DESC')->take($count)->get();

        } else {

            return Posts::active()->orderBy('publish_at', 'DESC')->select('posts.id', 'publish_at', 'posts.title_' . $lang . ' as title', 'posts.url_' . $lang . ' as url', 'posts.short_description_' . $lang . ' as short_description', 'posts.image', 'posts.created_at', 'posts.visits')

                ->take($count)->get();

        }

    }



    public static function getFilteredPostsPagination($categoryId, $paginate = 20, $lang)

    {


        if (

            $lang == 'lang1'

        ) {

            return Posts::join('post_category', 'posts.id', '=', 'post_category.post_id')

                ->where('post_category.category_id', '=', $categoryId)

                ->where('posts.active', '=', 1)

                ->whereNull('posts.deleted_at')

                ->select('posts.id', 'publish_at', 'posts.title', 'posts.url', 'posts.short_description', 'posts.image', 'posts.created_at', 'posts.visits')

                ->orderBy('posts.publish_at', 'DESC')

                ->paginate($paginate);;

        }


        return Posts::join('post_category', 'posts.id', '=', 'post_category.post_id')

            ->where('post_category.category_id', '=', $categoryId)

            ->where('posts.active', '=', 1)

            ->whereNull('posts.deleted_at')

            ->select('posts.id', 'publish_at', 'posts.title_' . $lang . ' as title', 'posts.url_' . $lang . ' as url', 'posts.short_description_' . $lang . ' as short_description', 'posts.image', 'posts.created_at', 'posts.visits')

            ->orderBy('posts.publish_at', 'DESC')

            ->paginate($paginate);

    }

    public static function getPostsByIdInLang($id, $lang)

    {



        if ($lang == 'lang1') {

            return Posts::find($id);

        }


        return Posts::where('posts.id', '=', $id)

            ->where('active', 1)

            ->select(

                '*',

                'title_' . $lang . ' as title',

                'url_' . $lang . ' as url',

                'short_description_' . $lang . ' as short_description',

                'description_' . $lang . ' as description'

            )

            ->first();

    }
    
}
