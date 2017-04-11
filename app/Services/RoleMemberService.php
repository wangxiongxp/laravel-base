<?php

namespace App\Services;

use App\Repositories\RoleMemberRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class RoleMemberService
{
    protected $roleMemberRepository;

    public function __construct()
    {
        $this->roleMemberRepository = new RoleMemberRepository();
    }

    public function queryRoleMember($arrData)
    {
        return $this->roleMemberRepository->queryRoleMember($arrData);
    }

    public function insertRoleMember($arrData)
    {
        $s_role_id  = $arrData['s_role_id'];
        $account_id = $arrData['account_id'];

        $accountArr = explode("_",$account_id);

        $data = array();
        $data['s_role_id'] = $s_role_id;
        foreach ($accountArr as $item) {
            $data['account_id'] = $item;
            $this->roleMemberRepository->insertRoleMember($data);
        }
        return true;
    }

    public function deleteRoleMember($s_role_id, $account_id)
    {
        return $this->roleMemberRepository->deleteRoleMember($s_role_id, $account_id);
    }

    public function getAccountRoles($account_id)
    {
        return $this->roleMemberRepository->getAccountRoles($account_id);
    }

}