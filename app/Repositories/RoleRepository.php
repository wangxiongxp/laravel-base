<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class RoleRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "s_role_id";
        $this->TableName  = 's_role';
    }

    /**
     * Query分页条件查询
     * @param $arrData
     * @return mixed
     */
    public function queryRole($arrData)
    {
        $draw       = $arrData['draw'] ;
        $keyword    = $arrData['keyword'] ;

        $length     = $arrData['length'] ;
        $start      = $arrData['start'] ;

        $query = DB::table($this->TableName);
        if(!empty($keyword)){
            $query->where('s_role_name','like', '%'.$keyword.'%');
        }

        $sum = $query->count();

        if(isset($arrData['orderBy'])){
            $arrSort = explode('.', $arrData['orderBy']);
            $query->orderBy($arrSort[0], $arrSort[1]);
        }

        if($sum > 0){
            $rows = $query->skip($start)->take($length)->get();
        }else{
            $rows = array();
        }

        //当前第几页
        $start = intval($start) + 1 ;
        if($start % $length == 0){
            $page = $start / $length ;
        }else{
            $page = $start / $length + 1 ;
        }

        $resultData = array();
        $resultData['draw']            = $draw ;
        $resultData['page']            = intval($page);//当前第几页
        $resultData['recordsTotal']    = $sum ;//总数量
        $resultData['recordsFiltered'] = $sum ;
        $resultData['items']           = $rows ;//数据

        return $resultData ;
    }

    /**
     * 查询操作
     * @param $s_role_id
     * @return mixed
     */
    public function getRoleById($s_role_id)
    {
        return Role::where('s_role_id', '=', $s_role_id)->first();
    }

    public function getCheckedMenus($s_role_id,$menu_parent)
    {
        return Menu::leftJoin('s_role_menu', function($join) use($s_role_id){
                $join->on('s_role_menu.menu_id', '=', 'menu.menu_id')
                     ->where('s_role_menu.s_role_id','=',$s_role_id);
                })
        ->where('menu.menu_parent','=', $menu_parent)
        ->orderBy('menu.menu_sort')
        ->select('menu.*','s_role_menu.s_role_id')->get();
    }

    public function getAllRoles()
    {
        return Role::all();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertRole($arrData)
    {
        return Role::create($arrData);
    }

    /**
     * 更新操作
     * @param $arrData
     * @return mixed
     */
    public function updateRole($arrData)
    {
        $s_role_id = $arrData['s_role_id'];
        return Role::where('s_role_id','=',$s_role_id)->update($arrData);
    }

    /**
     * 删除操作
     * @param $s_role_id
     * @return mixed
     */
    public function deleteRole($s_role_id)
    {
        return Role::where('s_role_id', '=', $s_role_id)->delete();
    }


}