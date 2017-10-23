<?php

namespace App\Services;

use App\Models\CmsCatalog;

/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsCatalogService
{
    public function __construct()
    {
        $this->PrimaryKey = "id";
        $this->TableName  = 'cms_catalog';
    }

    /**
     * 通过id查找分类
     * @param $id
     * @return mixed
     */
    public function getCatalogById($id)
    {
        return CmsCatalog::where('id', '=', $id)->first();
    }

    /**
     * 通过父亲id查找分类
     * @param $parent_id
     * @return mixed
     */
    public function getCatalogByParent($parent_id)
    {
        return CmsCatalog::where('parent_id', '=', $parent_id)->get();
    }

    /**
     * 保存分类
     * @param $arrData
     * @return bool
     */
    public function insertCatalog($arrData)
    {
        $arrData['is_leaf'] = 1;
        CmsCatalog::create($arrData);
        if($arrData['parent_id'] != 0){
            CmsCatalog::where('id','=',$arrData['parent_id'])->update([ 'is_leaf' => 0 ]);
        }
        return true ;
    }

    /**
     * 更新分类
     * @param $arrData
     * @return mixed
     */
    public function updateCatalog($arrData)
    {
        return CmsCatalog::where('id','=',$arrData['id'])->update($arrData);
    }

    /**
     * 删除分类
     * @param $id
     * @return bool
     */
    public function deleteCatalog($id)
    {
        $catalog = CmsCatalog::where('id', '=', $id)->first();
        CmsCatalog::where('id', '=', $id)->delete();
        $catalogs = CmsCatalog::where('parent_id', '=', $catalog->parent_id)->get();
        if(count($catalogs)<1){
            CmsCatalog::where('id','=',$catalog->parent_id)->update([ 'is_leaf' => 1 ]);
        }
        return true;
    }

    /**
     * 查找分类树
     * @param $parent_id
     * @return mixed
     */
    public function GetCatalogTree($parent_id)
    {
        $root = CmsCatalog::where('parent_id', '=', $parent_id)->orderBy('sort')->get();

        if(count($root)>0){
            foreach($root as &$item)
            {
                $item->sub = $this->GetCatalogTree($item->id);
            }
        }
        return $root;
    }


}