<?php

namespace App\Repositories;

use App\Models\Group;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class GroupRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "s_group_id";
        $this->TableName  = 's_group';
    }

    /**
     * 查询操作
     * @param $s_group_id
     * @return mixed
     */
    public function getGroupById($s_group_id)
    {
        $group = Group::leftJoin('s_group as parent','s_group.s_group_parent', '=', 'parent.s_group_id')
            ->leftJoin('s_group_type','s_group_type.s_group_type_id', '=', 's_group.s_group_type_id')
            ->select('s_group.*','parent.s_group_name as s_group_parent_name','s_group_type.s_group_type_name')
            ->where('s_group.s_group_id', '=', $s_group_id)->first();
        return $group;
    }

    public function getGroupByParent($s_group_parent)
    {
        return Group::where('s_group_parent', '=', $s_group_parent)->get();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertGroup($arrData)
    {
        return Group::create($arrData);
    }

    /**
     * 更新操作
     * @param $arrData
     * @return mixed
     */
    public function updateGroup($arrData)
    {
        $s_group_id = $arrData['s_group_id'];
        return Group::where('s_group_id','=',$s_group_id)->update($arrData);
    }

    /**
     * 删除操作
     * @param $s_group_id
     * @return mixed
     */
    public function deleteGroup($s_group_id)
    {
        return Group::where('s_group_id', '=', $s_group_id)->delete();
    }


}