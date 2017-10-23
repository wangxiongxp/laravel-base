<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\Request;

class UserController extends Controller{

    protected $accountService;

    public function __construct(AccountService $accountService){
        $this->middleware('auth');
        $this->accountService = $accountService;
    }

    public function queryAccount(Request $request){
        $queryParam = $this->buildSearchParam($request);
        $result = $this->accountService->queryAccount($queryParam);
        return $this->showPageResult($result);
    }

    public function saveAccount(Request $request){
        $this->accountService->insertAccount($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    public function updateAccount(Request $request){
        $this->accountService->updateAccount($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    public function deleteAccount($id){
        $this->accountService->deleteAccount($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

    public function resetPassword(Request $request){
        $account_id = $request['account_id'];
        $password = bcrypt($request['password']) ;
        $this->accountService->updateAccountPassword($account_id,$password);
        return $this->showJsonResult(true, '更新成功', null);
    }


}
