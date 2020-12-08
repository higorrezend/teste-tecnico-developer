<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAcess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function index (Request $request) {
        $this->setRequestQuery();
        $this->setRequestParams($request);
        return Response::json($this->model, 200, [], JSON_NUMERIC_CHECK);
    }

    private function setRequestQuery () {
        $this->model = $this->model->select('Users.id', 'name', 'email', 'active')
        ->addSelect([DB::raw('(
            select count(Users_acess.id) 
            from Users_acess 
            where Users_id = Users.id
        ) as logins')]);
    }

    private function setRequestParams ($request) {
        $this->checkParamLoginsDates($request);
        $this->checkParamName($request);
        $this->checkParamLoginTop($request);
        $this->checkParamOrder($request);
        $this->checkParamPerPage($request);
    }

    private function checkParamLoginsDates ($request) {
        if ($request->has('start_date') && $request->has('end_date')) {
            $this->model = $this->model
            ->join('Users_acess', 'Users.id', '=', 'Users_acess.Users_id')
            ->whereBetween('Users_acess.last_login', [$request->start_date, $request->end_date])
            ->groupBy('Users.id');
        }
    }

    private function checkParamName ($request) {
        if ($request->has('name')) {
            $this->model = $this->model->where('name', 'like', "%{$request->name}%");
        }
    }

    private function checkParamLoginTop ($request) {
        if ($request->has('loginTop')) {
            if ($request->loginTop == 'more') {
                $request->merge([
                    'perPage' => 10,
                    'order' => 'logins,desc'
                ]);
            } else if ($request->loginTop == 'minus') {
                $request->merge([
                    'perPage' => 10,
                    'order' => 'logins,asc'
                ]);
            }
        }
    }

    private function checkParamOrder ($request) {
        if ($request->has('order')) {
            $order = explode(',', $request->order);
            $this->model = $this->model->orderBy($order[0], $order[1]);
        }
    }

    private function checkParamPerPage ($request) {
        if ($request->has('perPage')) {
            $this->model = $this->model->paginate($request->perPage);
        }
    }
}
