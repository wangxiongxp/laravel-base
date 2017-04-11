<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Services\CmsCommentService;
use Illuminate\Http\Request;

class CmsCommentController extends Controller
{
    protected $cmsCommentService;

    public function __construct(CmsCommentService $cmsCommentService)
    {
        $this->middleware('auth');
        $this->cmsCommentService = $cmsCommentService;
    }

    public function index()
    {
        return view('admin/cms/comment/index');
    }

    public function queryComment(Request $request)
    {
        $queryParam = $this->buildSearchParam($request);
        $result = $this->cmsCommentService->queryComment($queryParam);
        return $this->showPageResult($result);
    }

    public function addComment(){
        return view('admin/cms/comment/addComment');
    }

    public function saveComment(Request $request)
    {
        $this->cmsCommentService->insertComment($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    public function viewComment($id){
        $data = array();
        $comment = $this->cmsCommentService->getCommentById($id);
        $data['comment'] = $comment ;
        return view('admin/cms/comment/viewComment',$data);
    }

    public function editComment($id){
        $data = array();
        $comment = $this->cmsCommentService->getCommentById($id);
        $data['comment'] = $comment ;
        return view('admin/cms/comment/editComment',$data);
    }

    public function updateComment(Request $request)
    {
        $this->cmsCommentService->updateComment($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    public function updateStatus(Request $request)
    {
        $this->cmsCommentService->updateStatus($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    public function deleteComment($id)
    {
        $this->cmsCommentService->deleteComment($id);
        return $this->showJsonResult(true, '删除成功', null);
    }


}
