<?php

namespace App\Repositories;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class MenuRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "id";
        $this->TableName  = 'cms_catalog';
    }

    /**
     * 查询操作
     * @param $id
     * @return mixed
     */
    public function getCatalogById($id)
    {
        return Menu::where('id', '=', $id)->first();
    }

    public function getCatalogByParent($parent_id)
    {
        return Menu::where('parent_id', '=', $parent_id)->get();
    }

    public function getFirstCatalog()
    {
        return Menu::where('parent_id', '=', 0)->get();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertMenu($arrData)
    {
        return Menu::create($arrData);
    }

    /**
     * 更新操作
     * @param $arrData
     * @return mixed
     */
    public function updateMenu($arrData)
    {
        $menu_id = $arrData['menu_id'];
        return Menu::where('menu_id','=',$menu_id)->update($arrData);
    }

    /**
     * 删除操作
     * @param $menu_id
     * @return mixed
     */
    public function deleteMenu($menu_id)
    {
        return Menu::where('menu_id', '=', $menu_id)->delete();
    }


}