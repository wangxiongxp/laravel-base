<?php

namespace App\Services;

use App\Http\Utils;
use App\Models\CmsArticle;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsArticleService
{
    public function __construct()
    {
        $this->PrimaryKey = "id";
        $this->TableName  = 'cms_article';
    }

    /**
     * 查询文章
     * @param $arrData
     * @return array
     */
    public function queryArticle($arrData)
    {
        $draw       = $arrData['draw'] ;
        $keyword    = $arrData['keyword'] ;

        $length     = $arrData['length'] ;
        $start      = $arrData['start'] ;

        $query = DB::table($this->TableName)
            ->leftJoin('cms_catalog','cms_catalog.id', '=', 'cms_article.catalog_id')
            ->select("cms_article.*","cms_catalog.name as cms_catalog_name");

        if(!empty($keyword)){
            $query->where('title','like', '%'.$keyword.'%');
        }

        $sum = $query->count();

        if(isset($arrData['orderBy'])){
            $arrSort = explode('.', $arrData['orderBy']);
            $query->orderBy($arrSort[0], $arrSort[1]);
        }

        if($sum > 0){
            $rows = $query->skip($start)->take($length)->get();
        }else{
            $rows = array();
        }

        //当前第几页
        $start = intval($start) + 1 ;
        if($start % $length == 0){
            $page = $start / $length ;
        }else{
            $page = $start / $length + 1 ;
        }

        $resultData = array();
        $resultData['draw']            = $draw ;
        $resultData['page']            = intval($page);//当前第几页
        $resultData['recordsTotal']    = $sum ;//总数量
        $resultData['recordsFiltered'] = $sum ;
        $resultData['items']           = $rows ;//数据

        return $resultData ;
    }

    /**
     * 通过id查找
     * @param $account_id
     * @return mixed
     */
    public function getArticleById($account_id)
    {
        return CmsArticle::select("cms_article.*","cms_catalog.name as catalog_name")
            ->leftJoin("cms_catalog","cms_catalog.id", "=", "cms_article.catalog_id")
            ->where('cms_article.id', '=', $id)
            ->first();
    }

    /**
     * 保存文章
     * @param $arrData
     * @return mixed
     */
    public function insertArticle($arrData)
    {
        if($arrData['status'] == 'PUBLISHED'){
            $arrData['publish_time'] = $arrData['created_at'] ;
        }
        return CmsArticle::create($arrData);
    }

    /**
     * 更新文章
     * @param $arrData
     * @return mixed
     */
    public function updateArticle($arrData)
    {
        $id = $arrData['id'];
        if($arrData['status'] == 'PUBLISHED'){
            $arrData['publish_time'] = Utils::GetDatetimeWithUTC();
        }
        return CmsArticle::where('id','=',$id)->update($arrData);
    }

    /**
     * 删除文章
     * @param $id
     * @return mixed
     */
    public function deleteArticle($id)
    {
        return CmsArticle::where('id', '=', $id)->delete();
    }

    /**
     * 更新置顶状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateIsTopStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["is_top"=>$status]);
    }

    /**
     * 更新评论状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateCommentStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["allow_comment"=>$status]);
    }

    /**
     * 更新可见状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateVisibilityStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["visibility"=>$status]);
    }

}