<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Customer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function customerSearch(Request $request)
    {
        $search = $request->input('search');

        if ($search) {

            $customer = Customer::where('user_id', auth()->user()->id)->where('cname', 'like', "%$search%")->orWhere('cemail', 'like', "%$search%")->orderByDesc('created_at')->paginate(10);
            return view('customerindex', compact('customer'));
        } else {
            // $customer = Customer::where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate(10);
            // return view('customerindex', compact('customer'));
            return redirect()->route('costumer.index');
        }
    }


    public function loanSearch(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $loan = Loan::where('user_id', auth()->user()->id)->with(['customer' => function ($query) use ($search) {
                $query->where('cname', 'like', "%$search%");
            }])
                ->whereHas('customer', function ($query) use ($search) {
                    $query->where('cname', 'like', "%$search%");
                })
                ->orderByDesc('created_at')->paginate();

            return view('loanindex', compact('loan'));
        }
    }

    public function transactionSearch(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
                if (auth()->user()->role_id != 2) {
                    $customer = Customer::where('cname', 'like', "%$search%")->where('user_id', auth()->user()->id)->with(['financial' => function ($query) {
                        $query->orderByDesc('created_at');
                    }])->paginate(10);

                    return view('financial', compact('customer', 'trasnactionExist'));
                } else {
                    $customer = Customer::where('cname', 'like', "%$search%")->with(['financial' => function ($query) {
                        $query->orderByDesc('created_at');
                    }])->paginate(10);

                    return view('financial', compact('customer'));
                }
        }


    }
}