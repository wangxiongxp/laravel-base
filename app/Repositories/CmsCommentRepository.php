<?php

namespace App\Repositories;

use App\Models\CmsComment;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsCommentRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "id";
        $this->TableName  = 'cms_comment';
    }

    /**
     * Query分页条件查询
     * @param $arrData
     * @return mixed
     */
    public function queryComment($arrData)
    {
        $draw       = $arrData['draw'] ;
        $keyword    = $arrData['keyword'] ;

        $length     = $arrData['length'] ;
        $start      = $arrData['start'] ;

        $query = DB::table($this->TableName)
            ->leftJoin('cms_article','cms_article.id', '=', 'cms_comment.article_id')
            ->select("cms_comment.*","cms_article.title as cms_article_title");

        if(!empty($keyword)){
            $query->where('account_name','like', '%'.$keyword.'%');
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
     * 查询操作
     * @param $id
     * @return mixed
     */
    public function getCommentById($id)
    {
        return CmsComment::leftJoin('cms_article','cms_article.id', '=', 'cms_comment.article_id')
            ->select("cms_comment.*","cms_article.title as cms_article_title")->where('cms_comment.id', '=', $id)->first();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertComment($arrData)
    {
        return CmsComment::create($arrData);

    }

    /**
     * 更新操作
     * @param $arrData
     * @return mixed
     */
    public function updateComment($arrData)
    {
        $id = $arrData['id'];
        return CmsComment::where('id','=',$id)->update($arrData);
    }

    public function updateStatus($arrData)
    {
        $id = $arrData['id'];
        $status = $arrData['status'];
        return CmsComment::where('id','=',$id)->update(["status"=>$status]);
    }

    /**
     * 删除操作
     * @param $id
     * @return mixed
     */
    public function deleteComment($id)
    {
        return CmsComment::where('id', '=', $id)->delete();
    }


}