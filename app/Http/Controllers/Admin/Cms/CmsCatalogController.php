<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Services\CmsCatalogService;
use Illuminate\Http\Request;

class CmsCatalogController extends Controller
{
    protected $cmsCatalogService;

    public function __construct(CmsCatalogService $cmsCatalogService)
    {
        $this->middleware('auth');
        $this->cmsCatalogService = $cmsCatalogService;
    }

    public function index()
    {
        $data = array();
        $data['catalogs'] = $this->cmsCatalogService->GetCatalogTree(0);
        return view('admin/cms/catalog/index',$data);
    }

    public function addCatalog(){
        return view('admin/cms/catalog/addCatalog');
    }

    public function saveCatalog(Request $request)
    {
        $this->cmsCatalogService->insertCatalog($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    public function editCatalog($id){
        $data = array();
        $catalog = $this->cmsCatalogService->getCatalogById($id);
        $data['catalog'] = $catalog ;
        return view('admin/cms/catalog/editCatalog',$data);
    }

    public function updateCatalog(Request $request)
    {
        $this->cmsCatalogService->updateCatalog($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    public function deleteCatalog($id)
    {
        $this->cmsCatalogService->deleteCatalog($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

    public function getCatalogByParent($parent_id)
    {
        $result = $this->cmsCatalogService->getCatalogByParent($parent_id);
        return $this->showJsonResult(true, '查询成功', $result);
    }

}
