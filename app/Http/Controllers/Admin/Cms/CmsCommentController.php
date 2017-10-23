<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Services\CmsCommentService;
use Illuminate\Http\Request;

class CmsCommentController extends Controller{

    protected $cmsCommentService;

    public function __construct(CmsCommentService $cmsCommentService){
        $this->middleware('auth');
        $this->cmsCommentService = $cmsCommentService;
    }

    /**
     * 评论列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('admin/cms/comment/index');
    }

    /**
     * 查询评论
     * @param Request $request
     * @return mixed
     */
    public function queryComment(Request $request){
        $queryParam = $this->buildSearchParam($request);
        $result = $this->cmsCommentService->queryComment($queryParam);
        return $this->showPageResult($result);
    }

    /**
     * 新增评论
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addComment(){
        return view('admin/cms/comment/addComment');
    }

    /**
     * 保存评论
     * @param Request $request
     * @return mixed
     */
    public function saveComment(Request $request){
        $this->cmsCommentService->insertComment($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    /**
     * 查看评论
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewComment($id){
        $data = array();
        $comment = $this->cmsCommentService->getCommentById($id);
        $data['comment'] = $comment ;
        return view('admin/cms/comment/viewComment',$data);
    }

    /**
     * 编辑评论
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editComment($id){
        $data = array();
        $comment = $this->cmsCommentService->getCommentById($id);
        $data['comment'] = $comment ;
        return view('admin/cms/comment/editComment',$data);
    }

    /**
     * 更新评论
     * @param Request $request
     * @return mixed
     */
    public function updateComment(Request $request){
        $this->cmsCommentService->updateComment($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 更新评论状态
     * @param Request $request
     * @return mixed
     */
    public function updateStatus(Request $request){
        $this->cmsCommentService->updateStatus($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 删除评论
     * @param $id
     * @return mixed
     */
    public function deleteComment($id){
        $this->cmsCommentService->deleteComment($id);
        return $this->showJsonResult(true, '删除成功', null);
    }


}
