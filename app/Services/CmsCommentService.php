<?php

namespace App\Services;

use App\Repositories\CmsCommentRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsCommentService
{
    protected $cmsCommentRepository;

    public function __construct()
    {
        $this->cmsCommentRepository = new CmsCommentRepository();
    }

    public function queryComment($arrData)
    {
        return $this->cmsCommentRepository->queryComment($arrData);
    }

    public function getCommentById($id)
    {
        return $this->cmsCommentRepository->getCommentById($id);
    }

    public function insertComment($arrData)
    {
        return $this->cmsCommentRepository->insertComment($arrData);
    }

    public function updateComment($arrData)
    {
        return $this->cmsCommentRepository->updateComment($arrData);
    }

    public function updateStatus($arrData)
    {
        return $this->cmsCommentRepository->updateStatus($arrData);
    }

    public function deleteComment($id)
    {
        return $this->cmsCommentRepository->deleteComment($id);
    }

    public function updateCommentPassword($id,$password)
    {
        return $this->cmsCommentRepository->updateCommentPassword($id, $password);
    }

}