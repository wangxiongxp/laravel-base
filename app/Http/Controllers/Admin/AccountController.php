<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->middleware('auth');
        $this->accountService = $accountService;
    }

    public function index()
    {
        return view('admin/account/index');
    }

    public function queryAccount(Request $request)
    {
        $queryParam = $this->buildSearchParam($request);
        $result = $this->accountService->queryAccount($queryParam);
        return $this->showPageResult($result);
    }

    public function addAccount(){
        return view('admin/account/addAccount');
    }

    public function saveAccount(Request $request)
    {
        $this->accountService->insertAccount($request->all());
        return $this->showJsonResult(true, '保存成功', null);
    }

    public function editAccount($account_id){
        $data = array();
        $account = $this->accountService->getAccountById($account_id);
        $data['account'] = $account ;
        return view('admin/account/editAccount',$data);
    }

    public function updateAccount(Request $request)
    {
        $this->accountService->updateAccount($request->all());
        return $this->showJsonResult(true, '更新成功', null);
    }

    public function deleteAccount($id)
    {
        $this->accountService->deleteAccount($id);
        return $this->showJsonResult(true, '删除成功', null);
    }

    public function showResetPassword($account_id){
        $data = array();
        $data['account_id'] = $account_id ;

        return view('admin/account/password',$data);
    }

    public function resetPassword(Request $request)
    {
        $account_id = $request['account_id'];
        $password = bcrypt($request['password']) ;
        $this->accountService->updateAccountPassword($account_id,$password);
        return $this->showJsonResult(true, '更新成功', null);
    }


}
