<?php

namespace App\Services;

use App\Models\RoleMenu;
use App\Repositories\RoleRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class RoleService
{
    protected $roleRepository;

    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
    }

    public function queryRole($arrData)
    {
        return $this->roleRepository->queryRole($arrData);
    }

    public function getRoleById($s_role_id)
    {
        return $this->roleRepository->getRoleById($s_role_id);
    }

    public function insertRole($arrData)
    {
        return $this->roleRepository->insertRole($arrData);
    }

    public function updateRole($arrData)
    {
        return $this->roleRepository->updateRole($arrData);
    }

    public function deleteRole($s_role_id)
    {
        return $this->roleRepository->deleteRole($s_role_id);
    }

    public function getRoleTree()
    {
        $root = $this->roleRepository->getAllRoles();

        $arrResult = array();

        $arrSub = array();
        $opened = array();
        $opened['opened'] = true;
        foreach($root as $item)
        {
            unset($arrSub);
            $arrSub['id']    = $item->s_role_id;
            $arrSub['text']  = $item->s_role_name;
            $arrSub['state']  = $opened;
            $arrSub['children'] = [];

            $arrResult[] = $arrSub;
        }
        return $arrResult;
    }

    public function GetMenuTreeOfRole($parent_id,$s_role_id)
    {
        $arrResult = array();
        $root = RoleMenu::join('menu', 's_role_menu.menu_id', '=' ,'menu.menu_id')
            ->select('menu.*', 's_role_menu.s_role_id' )
            ->where( 's_role_menu.s_role_id', '=', $s_role_id)
            ->where('menu.menu_parent','=', $parent_id)
            ->orderBy('menu.menu_sort')
            ->get();

        $arrSub = array();
        foreach($root as $item)
        {
            unset($arrSub);
            $arrSub['id']         = $item->menu_id;
            $arrSub['title']      = $item->menu_text;
            $arrSub['icon_class'] = $item->menu_css ;
            $arrSub['url']        = $item->menu_url ;

            $hasChild = false;
            $children = $this->GetMenuTreeOfRole($item->menu_id,$s_role_id);
            if(count($children)>0){
                $hasChild  = true;
            }
            $arrSub['hasChild']   = $hasChild;
            $arrSub['children']   = $children ;
            $arrResult[] = $arrSub;
        }

        return $arrResult;
    }

    public function getCheckedMenus($s_role_id,$menu_parent)
    {
        $root = $this->roleRepository->getCheckedMenus($s_role_id,$menu_parent);
        foreach($root as &$item)
        {
            $item->sub = $this->getCheckedMenus($s_role_id,$item->menu_id);
        }
        return $root;
    }

    public function saveMenus($arrData)
    {
        $s_role_id = $arrData['s_role_id'];
        RoleMenu::where('s_role_id', '=', $s_role_id)->delete();

        $arrMenu = $arrData['menu_id'];

        $data = array();
        $data['s_role_id'] = $s_role_id ;
        foreach ($arrMenu as $menu_id) {
            $data['menu_id'] = $menu_id ;
            RoleMenu::create($data);
        }
    }

}