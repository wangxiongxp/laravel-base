<?php

namespace App\Services;

use App\Repositories\GroupMemberRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class GroupMemberService
{
    protected $groupMemberRepository;

    public function __construct()
    {
        $this->roleRepository = new GroupMemberRepository();
    }

    public function queryGroupMember($arrData)
    {
        return $this->roleRepository->queryGroupMember($arrData);
    }

    public function insertGroupMember($arrData)
    {
        $s_group_id  = $arrData['s_group_id'];
        $account_id = $arrData['account_id'];

        $accountArr = explode("_",$account_id);

        $data = array();
        $data['s_group_id'] = $s_group_id;
        foreach ($accountArr as $item) {
            $data['account_id'] = $item;
            $this->roleRepository->insertGroupMember($data);
        }
        return true;
    }

    public function deleteGroupMember($s_group_id,$account_id)
    {
        return $this->roleRepository->deleteGroupMember($s_group_id,$account_id);
    }


}