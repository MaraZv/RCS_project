<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\User;
use App\Http\Requests\IncomeRequest;

class IncomeController extends Controller
{
    public function income(Income $income, User $user) {
        $user = \Auth::user();
        $total_incomes = Income::all()->where('user_id', $user->id)->sum('amount');
        
        $incomes = $user->incomes;

        return view('incomes', [
            'total_incomes' => $total_incomes,
            'incomes' => $user->incomes()->paginate(15)
        ]);
    }
    
    public function single($id) {
        $user = \Auth::user();
        $income = Income::find($id);
        return view('income', [
            'income' => $income,
        ]);
    }

    public function submit(Income $income, IncomeRequest $request) {
        $income = new Income();
        $user = \Auth::user();

        $income->sender = $request->input('sender');
        $income->received_for = $request->input('description');
        $income->amount = $request->input('amount');
        $income->user_id = $user;

        $user->incomes()->save($income);

        return back();
    }
}
