<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller{

    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->middleware('auth');
        $this->menuService = $menuService;
    }

    /**
     * 菜单列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $data = array();
        $data['menus'] = $this->menuService->GetMenuTree(0);
        return view('admin/menu/index',$data);
    }

    /**
     * 查询一级菜单
     * @return mixed
     */
    public function getFirstMenu(){
        $result = $this->menuService->getFirstMenu();
        return $this->showJsonResult(true, '查询成功', $result);
    }

    /**
     * 新增菜单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addMenu(){
        return view('admin/menu/addMenu');
    }

    /**
     * 保存菜单
     * @param Request $request
     * @return mixed
     */
    public function saveMenu(Request $request){
        $this->menuService->insertMenu($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    /**
     * 编辑菜单
     * @param $menu_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMenu($menu_id){
        $data = array();
        $menu = $this->menuService->getMenuById($menu_id);
        $data['menu'] = $menu ;
        return view('admin/menu/editMenu',$data);
    }

    /**
     * 更新菜单
     * @param Request $request
     * @return mixed
     */
    public function updateMenu(Request $request){
        $this->menuService->updateMenu($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    /**
     * 删除菜单
     * @param $id
     * @return mixed
     */
    public function deleteMenu($id){
        $this->menuService->deleteMenu($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

}
