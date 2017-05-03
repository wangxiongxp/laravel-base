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

    public function getCatalogById($id)
    {
        return CmsCatalog::where('id', '=', $id)->first();
    }

    public function getCatalogByParent($parent_id)
    {
        return CmsCatalog::where('parent_id', '=', $parent_id)->get();
    }

    public function insertCatalog($arrData)
    {
        $arrData['is_leaf'] = 1;
        CmsCatalog::create($arrData);
        if($arrData['parent_id'] != 0){
            CmsCatalog::where('id','=',$arrData['parent_id'])->update([ 'is_leaf' => 0 ]);
        }
        return true ;
    }

    public function updateCatalog($arrData)
    {
        return CmsCatalog::where('id','=',$arrData['id'])->update($arrData);
    }

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