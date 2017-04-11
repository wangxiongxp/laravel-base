<?php

namespace App\Services;

use App\Repositories\AccountRepository;


/**
 * Created by PhpStorm.
 * User: wangxiong
 * Date: 2017/3/28
 * Time: 15:16
 */
class AccountService
{
    protected $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }

    public function queryAccount($arrData)
    {
        return $this->accountRepository->queryAccount($arrData);
    }

    public function getAccountById($account_id)
    {
        return $this->accountRepository->getAccountById($account_id);
    }

    public function insertAccount($arrData)
    {
        return $this->accountRepository->insertAccount($arrData);
    }

    public function updateAccount($arrData)
    {
        return $this->accountRepository->updateAccount($arrData);
    }

    public function deleteAccount($account_id)
    {
        return $this->accountRepository->deleteAccount($account_id);
    }

    public function updateAccountPassword($account_id,$password)
    {
        return $this->accountRepository->updateAccountPassword($account_id, $password);
    }

}