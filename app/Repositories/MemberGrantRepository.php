<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\MemberGrant;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class MemberGrantRepository
{
    public function __construct()
    {
        $this->PrimaryKey = "account_id";
        $this->TableName  = 's_member_grant';
    }

    /**
     * 查询操作
     * @param $account_id
     * @return mixed
     */
    public function getMemberGrantByAccountId($account_id)
    {
        return MemberGrant::where('account_id', '=', $account_id)->get();
    }

    /**
     * 新增操作
     * @param $arrData
     * @return mixed
     */
    public function insertMemberGrant($arrData)
    {
        return MemberGrant::create($arrData);
    }

    /**
     * 删除操作
     * @param $account_id
     * @return mixed
     */
    public function deleteMemberGrant($account_id)
    {
        return MemberGrant::where('account_id', '=', $account_id)->delete();
    }

}