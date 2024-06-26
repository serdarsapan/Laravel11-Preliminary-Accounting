<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::orderBy('id','asc')->get();
        return view('admin.accounts.index', compact('accounts'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $category = Category::pluck('name','id');
       
        return view('admin.accounts.edit')->with(['categories'=> $categories, 'category'=>$category]);
    }

    public function store(AccountRequest $request)
    {
        $oDateParts = explode('/', $request->oDate);
        if (count($oDateParts) === 3) {
            $oDate = $oDateParts[2] . '-' . $oDateParts[1] . '-' . $oDateParts[0];
        } else {
            return back()->withErrors(['oDate' => 'Invalid date format.']);
        }

       Account::create([
        'name' => $request->name,
        'iban' => $request->iban,
        'description' => $request->description,
        'bankName' => $request->bankName,
        'branch' => $request->branch,
        'accountNo' => $request->accountNo,
        'oDate' => $request->oDate,
        'currency' => $request->currency,
        'balance' => $request->balance,
        'status' => $request->status
        ]);


        return back()->with('success', 'Account created successfully');
    }

    public function show($id)
    {
        //
        
    }

    public function edit($id)
    {
        $account = Account::find($id);
        $categories = Category::pluck('name','id');
        $selectedCategory = BlogCategory::whereBlogId($id)->pluck('category_id')->toArray();

        return view('admin.accounts.edit', compact('categories','selectedCategory','account'));
    }

    public function update(AccountRequest $request, $id)
    {
        $account = Account::find($id);
        if ($account) {
            $account->update([
                'name' => $request->name,
                'iban' => $request->iban,
                'description' => $request->description,
                'bankName' => $request->bankName,
                'branch' => $request->branch,
                'accountNo' => $request->accountNo,
                'oDate' => $request->oDate,
                'currency' => $request->currency,
                'balance' => $request->balance,
                'status' => $request->status
            ]);
        }
            return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }

    public function destroy($id)
    {
        $Account = Account::findOrFail($id);
        $Account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }

    public function status(Request $request)
    {
        $status = $request->status;
        $updateCheck = $status == "false" ? '0' : '1';

        Account::where('id',$request->id)->update(['status'=> $updateCheck]);

        return response(['error'=>false,'status'=>$status]);
    }
}