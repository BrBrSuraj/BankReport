<?php

use App\Models\Loan;
use App\Models\Customer;
use App\Models\Financial;
use App\Models\Installment;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('', function () {
    if (auth()->user()) {
        return redirect()->route('/home');
    } else {
        return view('auth.login');
    }
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'is_admin'], function () {
        Route::resource('user', UserController::class);
    });

    Route::get('home', function () {
        $customer = Customer::count();
        $loan = Loan::select('amount')->get();
        $loanAmount = $loan->sum('amount');
        $financial = Financial::select('paidIntrestAmount', 'dueAmount', 'paidLoanAmount', 'totalPaid')->get();
        $dueAmount = $financial->sum('dueAmount');
        $paidIntrestAmount = $financial->sum('paidIntrestAmount');
        $paidLoanAmount = $financial->sum('paidLoanAmount');
        $totalPaid = $financial->sum('totalPaid');
        $installment = Installment::count();
        return view('home', compact('customer', 'loanAmount', 'dueAmount', 'paidIntrestAmount', 'paidLoanAmount', 'totalPaid', 'installment'));
    })->name('/home');

    // user profile information & update password
    Route::get('userprofile/{id}', [UserProfileController::class, 'userprofile'])->name('userprofile');
    Route::match(['get', 'post', 'patch'], 'userpassword/{user}', [UserProfileController::class, 'updatePassword'])->name('userpassword');

    // for report and generate report as pdf
    Route::get('report', [ReportController::class, 'report'])->name('report');
    Route::post('loanreport', [ReportController::class, 'loanreport'])->name('loanreport');
    Route::get('exportpdf/{fiscalYear}', [ExportController::class, 'exportpdf'])->name('exportpdf');

    // import excel file for customer and loan
    Route::match(['get', 'post'], 'customer.import', [ImportController::class, 'cimport'])->name('customer.import');
    Route::match(['get', 'post'], 'loan.excel.import', [ImportController::class, 'loanimport'])->name('loan.excel.import');

    // for pay the installment of specific customer
    Route::get('installmentcreate/{id}', [InstallmentController::class, 'installmentcreate'])->name('installmentcreate');

    // search for customer loand and transaction details with name and email
    Route::match(['get', 'post'], '/customer/search', [SearchController::class, 'customerSearch'])->name('customer.search');
    Route::match(['get', 'post'], '/loan/search', [SearchController::class, 'loanSearch'])->name('loan.search');
    Route::match(['get', 'post'], '/transaction/search', [SearchController::class, 'transactionSearch'])->name('transaction.search');

    //demo excel file for upload customer and their loan
    Route::get('customerexport', [ExportController::class, 'CdemoExport'])->name('customerexport');
    Route::get('customerloanexport', [ExportController::class, 'LdemoExport'])->name('customerloanexport');


    // resourcefull controller
    Route::resource('costumer', CustomerController::class);
    Route::resource('loan', LoanController::class);
    Route::resource('financial', FinancialController::class);
});
