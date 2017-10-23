<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Services\CmsCatalogService;
use Illuminate\Http\Request;

class CmsCatalogController extends Controller{

    protected $cmsCatalogService;

    public function __construct(CmsCatalogService $cmsCatalogService){
        $this->middleware('auth');
        $this->cmsCatalogService = $cmsCatalogService;
    }

    public function index(Request $request){
        $act = $request['act'] ? $request['act'] : '' ;
        if($act == 'add'){
            return view('admin/cms/catalog/addCatalog');
        }elseif ($act == 'edit'){
            $data = array();
            $catalog = $this->cmsCatalogService->getCatalogById($request['id']);
            $data['catalog'] = $catalog ;
            return view('admin/cms/catalog/editCatalog',$data);
        }else{
            $data = array();
            $data['catalogs'] = $this->cmsCatalogService->GetCatalogTree(0);
            return view('admin/cms/catalog/index',$data);
        }
    }

    /**
     * 保存文章分类
     * @param Request $request
     * @return mixed
     */
    public function saveCatalog(Request $request){
        $this->cmsCatalogService->insertCatalog($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    /**
     * 更新文章分类
     * @param Request $request
     * @return mixed
     */
    public function updateCatalog(Request $request){
        $this->cmsCatalogService->updateCatalog($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 删除文章分类
     * @param $id
     * @return mixed
     */
    public function deleteCatalog($id){
        $this->cmsCatalogService->deleteCatalog($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

    /**
     * 通过父id查找分类
     * @param $parent_id
     * @return mixed
     */
    public function getCatalogByParent($parent_id){
        $result = $this->cmsCatalogService->getCatalogByParent($parent_id);
        return $this->showJsonResult(true, '查询成功', $result);
    }

}
