<?php

namespace App\Repositories;

use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class GroupMemberRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "s_group_id";
        $this->TableName  = 's_group_member';
    }

    /**
     * Query分页条件查询
     * @param $arrData
     * @return mixed
     */
    public function queryGroupMember($arrData)
    {
        $draw       = $arrData['draw'] ;
        $keyword    = $arrData['keyword'] ;

        $length     = $arrData['length'] ;
        $start      = $arrData['start'] ;

        $query = DB::table($this->TableName)
            ->leftJoin('s_group','s_group.s_group_id', '=', 's_group_member.s_group_id')
            ->leftJoin('account','s_group_member.account_id', '=', 'account.account_id')
            ->select('s_group_member.*','s_group.s_group_name','account.account_real_name');

        if(!empty($keyword)){
            $query->where('s_group_name','like', '%'.$keyword.'%');
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
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertGroupMember($arrData)
    {
        return GroupMember::create($arrData);
    }

    /**
     * 删除操作
     * @param $s_group_id
     * @param $account_id
     * @return mixed
     */
    public function deleteGroupMember($s_group_id,$account_id)
    {
        return GroupMember::where('s_group_id', '=', $s_group_id)->where('account_id', '=', $account_id)->delete();
    }


}