<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Services\CmsArticleService;
use Illuminate\Http\Request;

class CmsArticleController extends Controller{

    protected $cmsArticleService;

    public function __construct(CmsArticleService $cmsArticleService){
        $this->middleware('auth');
        $this->cmsArticleService = $cmsArticleService;
    }

    public function index(Request $request){
        $act = $request['act'] ? $request['act'] : '' ;
        if($act == 'add'){
            return view('admin/cms/article/addArticle');
        }elseif ($act == 'edit'){
            $data = array();
            $article = $this->cmsArticleService->getArticleById($request['id']);
            $data['article'] = $article ;
            return view('admin/cms/article/editArticle',$data);
        }else{
            return view('admin/cms/article/index');
        }
    }

    /**
     * 查询文章
     * @param Request $request
     * @return mixed
     */
    public function queryArticle(Request $request){
        $queryParam = $this->buildSearchParam($request);
        $result = $this->cmsArticleService->queryArticle($queryParam);
        return $this->showPageResult($result);
    }

    /**
     * 保存文章
     * @param Request $request
     * @return mixed
     */
    public function saveArticle(Request $request){
        $this->cmsArticleService->insertArticle($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    /**
     * 更新文章
     * @param Request $request
     * @return mixed
     */
    public function updateArticle(Request $request){
        $this->cmsArticleService->updateArticle($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 删除文章
     * @param $id
     * @return mixed
     */
    public function deleteArticle($id){
        $this->cmsArticleService->deleteArticle($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

    /**
     * 更新置顶状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateIsTopStatus($id,$status){
        $this->cmsArticleService->updateIsTopStatus($id,$status);
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 更新评论状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateCommentStatus($id,$status){
        $this->cmsArticleService->updateCommentStatus($id,$status);
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 更新可见状态
     * @param $id
     * @param $status
     * @return mixed
     */
    public function updateVisibilityStatus($id,$status){
        $this->cmsArticleService->updateVisibilityStatus($id,$status);
        return $this->showJsonResult(true, '更新成功', null);
    }

}
