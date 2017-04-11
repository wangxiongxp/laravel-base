<?php

namespace App\Services;

use App\Models\CmsArticle;
use App\Repositories\CmsArticleRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsArticleService
{
    protected $cmsArticleRepository;

    public function __construct()
    {
        $this->cmsArticleRepository = new CmsArticleRepository();
    }

    public function queryArticle($arrData)
    {
        return $this->cmsArticleRepository->queryArticle($arrData);
    }

    public function getArticleById($account_id)
    {
        return $this->cmsArticleRepository->getArticleById($account_id);
    }

    public function insertArticle($arrData)
    {
        return $this->cmsArticleRepository->insertArticle($arrData);
    }

    public function updateArticle($arrData)
    {
        return $this->cmsArticleRepository->updateArticle($arrData);
    }

    public function deleteArticle($account_id)
    {
        return $this->cmsArticleRepository->deleteArticle($account_id);
    }

    public function updateIsTopStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["is_top"=>$status]);
    }

    public function updateCommentStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["allow_comment"=>$status]);
    }

    public function updateVisibilityStatus($id,$status)
    {
        return CmsArticle::where('id','=',$id)->update(["visibility"=>$status]);
    }

}