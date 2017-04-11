<?php

namespace App\Services;

use App\Repositories\MenuRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class MenuService
{
    protected $menuRepository;

    public function __construct()
    {
        $this->menuRepository = new MenuRepository();
    }

    public function getMenuById($menu_id)
    {
        return $this->menuRepository->getMenuById($menu_id);
    }

    public function getFirstMenu()
    {
        return $this->menuRepository->getFirstMenu();
    }

    public function insertMenu($arrData)
    {
        $arrData['menu_leaf'] = 1;
        $this->menuRepository->insertMenu($arrData);
        if($arrData['menu_parent'] != 0){
            $data = array();
            $data['menu_id'] = $arrData['menu_parent'] ;
            $data['menu_leaf'] = 0 ;
            $this->menuRepository->updateMenu($data);
        }
        return true ;
    }

    public function updateMenu($arrData)
    {
        return $this->menuRepository->updateMenu($arrData);
    }

    public function deleteMenu($menu_id)
    {
        $menu = $this->menuRepository->getMenuById($menu_id);
        $this->menuRepository->deleteMenu($menu_id);
        $menus = $this->menuRepository->getMenuByParent($menu->menu_parent);
        if(count($menus)<1){
            $data = array();
            $data['menu_id'] = $menu->menu_parent ;
            $data['menu_leaf'] = 1;
            $this->menuRepository->updateMenu($data);
        }
        return true;
    }

    public function GetMenuTree($menu_parent)
    {
        $root = $this->menuRepository->getMenuByParent($menu_parent);

        if(count($root)>0){
            foreach($root as &$item)
            {
                $item->sub = $this->GetMenuTree($item->menu_id);
            }
        }
        return $root;
    }


}