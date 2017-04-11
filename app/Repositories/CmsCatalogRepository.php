<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Models\CmsCatalog;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class CmsCatalogRepository
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
        return CmsCatalog::where('id', '=', $id)->first();
    }

    public function getCatalogByParent($parent_id)
    {
        return CmsCatalog::where('parent_id', '=', $parent_id)->get();
    }

    public function getFirstCatalog()
    {
        return CmsCatalog::where('parent_id', '=', 0)->get();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertCatalog($arrData)
    {
        return CmsCatalog::create($arrData);
    }

    /**
     * 更新操作
     * @param $arrData
     * @return mixed
     */
    public function updateCatalog($arrData)
    {
        $id = $arrData['id'];
        return CmsCatalog::where('id','=',$id)->update($arrData);
    }

    /**
     * 删除操作
     * @param $id
     * @return mixed
     */
    public function deleteCatalog($id)
    {
        return CmsCatalog::where('id', '=', $id)->delete();
    }


}