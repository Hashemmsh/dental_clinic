<?php


use App\Models\Medicine;
use App\Models\Apponment;
use Faker\Provider\Medical;
use App\Models\Medical_bill;
use App\Models\Invoice_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\ApponmentController;
use App\Http\Controllers\Admin\Medical_billController;
use App\Http\Controllers\Admin\Invoice_reportController;
use App\Http\Controllers\Admin\InvoiceDetailsController;
use App\Http\Controllers\Admin\Company_invoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Company_invoice_reportController;
use App\Http\Controllers\Admin\Company_invoice_detailsController;

    Route::prefix('admin')->name('admin.')->middleware(['auth','check_user'])->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');


/////////////////////// doctors Route///////////////////////////
        Route::get('doctors/download-pdf',[DoctorController::class,'pdf'])
         ->name('doctors.pdf');

        Route::get('doctors/print',[DoctorController::class,'print'])
         ->name('doctors.print');

        Route::get('doctors/trash',[DoctorController::class,'trash'])
          ->name('doctors.trash');

        Route::get('doctors/{id}/restore',[DoctorController::class,'restore'])
         ->name('doctors.restore');

        Route::get('doctors/{id}/forcedelete',[DoctorController::class,'forcedelete'])
         ->name('doctors.forcedelete');
        Route::resource('doctors',DoctorController::class);

/////////////////////////////////Patient Route//////////////////////////////
        Route::get('patients/download-pdf',[PatientController::class,'PDF'])
         ->name('patient.pdf');

        Route::get('patients/print',[PatientController::class,'print'])
         ->name('patient.print');

        Route::get('patients/trash',[PatientController::class,'trash'])
         ->name('patients.trash');

        Route::get('patients/{id}/restore',[PatientController::class,'restore'])
         ->name('patients.restore');

        Route::get('patients/{id}/forcedelete',[PatientController::class,'forcedelete'])
         ->name('patients.forcedelete');
        Route::resource('patients',PatientController::class);

//////////////////////Service Route////////////////////////////////////
        Route::get('services/trash',[ServiceController::class,'trash'])
         ->name('services.trash');

        Route::get('services/{id}/restore',[ServiceController::class,'restore'])
         ->name('services.restore');

        Route::get('services/{id}/forcedelete',[ServiceController::class,'forcedelete'])
         ->name('services.forcedelete');

        Route::resource('services',ServiceController::class);



/////////////////////////////////////Invoice Route////////////////////////////////////
Route::get('invoices/download-pdf',[InvoiceController::class,'pdf'])
->name('invoices.pdf');
        Route::get('invoice_paid',[InvoiceController::class,'invoice_paid'])->name('invoice_paid');

        Route::get('invoice_unpaid',[InvoiceController::class,'invoice_unpaid'])->name('invoice_unpaid');

        Route::get('invoice_partial',[InvoiceController::class,'invoice_partial'])->name('invoice_partial');

        Route::get('/invoice_status_show/{id}', [InvoiceController::class,'invoice_status_show'])->name('invoice_status_show');

        Route::post('/invoice_status_update/{id}',[InvoiceController::class,'invoice_status_update'])->name('invoice_status_update');

         Route::get('invoices/print/{id}',[InvoiceController::class,'print'])->name('invoices.print');

        Route::get('invoices/trash',[InvoiceController::class,'trash'])->name('invoices.trash');

        Route::get('invoices/{id}/restore',[InvoiceController::class,'restore'])->name('invoices.restore');

        Route::get('invoices/{id}/forcedelete',[InvoiceController::class,'forcedelete'])->name('invoices.forcedelete');
        Route::resource('invoices',InvoiceController::class);




///////////////////////////Apponment Route///////////////////////////////

                    //change status apponment//
        Route::get('apponment/approved/{id}',[ApponmentController::class,'approved'])
            ->name('apponment.approved');
        Route::get('apponment/canceled/{id}',[ApponmentController::class,'canceled'])
            ->name('apponment.canceled') ;

        Route::get('apponments/trash',[ApponmentController::class,'trash'])
         ->name('apponments.trash');

        Route::get('apponments/{id}/restore',[ApponmentController::class,'restore'])
         ->name('apponments.restore');

        Route::get('apponments/{id}/forcedelete',[ApponmentController::class,'forcedelete'])
         ->name('apponments.forcedelete');
        Route::resource('apponment',ApponmentController::class);

/////////////////////////////Medicine Route/////////////////////////////////////////////
        Route::get('medicines/trash',[MedicineController::class,'trash'])
         ->name('medicines.trash');

        Route::get('medicines/{id}/restore',[MedicineController::class,'restore'])
         ->name('medicines.restore');

        Route::get('medicines/{id}/forcedelete',[MedicineController::class,'forcedelete'])
         ->name('medicines.forcedelete');
        Route::resource('medicines',MedicineController::class);

///////////////////////////Medical_bill Route/////////////////////////////////////
        Route::get('medical_bills/print/{id}',[Medical_billController::class,'print'])
         ->name('print');

        Route::get('medical_bills/trash',[Medical_billController::class,'trash'])
         ->name('medical_bills.trash');

        Route::get('medical_bills/{id}/restore',[Medical_billController::class,'restore'])
         ->name('medical_bills.restore');

        Route::get('medical_bills/{id}/forcedelete',[Medical_billController::class,'forcedelete'])
         ->name('medical_bills.forcedelete');

        Route::resource('medical_bills',Medical_billController::class);

///////////////////////////company_invoice Route/////////////////////////////////////

        Route::get('company_invoices/download-pdf',[Company_invoiceController::class,'pdf'])
        ->name('company_invoices.pdf');

        Route::get('company_invoice_paid',[Company_invoiceController::class,'company_invoice_paid'])
        ->name('company_invoice_paid');

        Route::get('company_invoice_unpaid',[Company_invoiceController::class,'company_invoice_unpaid'])
        ->name('company_invoice_unpaid');

        Route::get('company_invoice_partial',[Company_invoiceController::class,'company_invoice_partial'])
        ->name('company_invoice_partial');

        Route::get('/company_status_show/{id}', [Company_invoiceController::class,'company_status_show'])
        ->name('company_status_show');

        Route::post('/company_status_update/{id}',[Company_invoiceController::class,'company_status_update'])
        ->name('company_status_update');

        Route::get('company_invoices/print/{id}',[Company_invoiceController::class,'print'])
         ->name('company_print');

        Route::get('company_invoices/trash',[Company_invoiceController::class,'trash'])
         ->name('company_invoices.trash');

        Route::get('company_invoices/{id}/restore',[Company_invoiceController::class,'restore'])
         ->name('company_invoices.restore');

        Route::get('company_invoices/{id}/forcedelete',[Company_invoiceController::class,'forcedelete'])
         ->name('company_invoices.forcedelete');
        Route::resource('company_invoices',Company_invoiceController::class);

/////////////////////////////////////expenses Route///////////////////////////////////////////////
        Route::get('expenses/print',[ExpenseController::class,'print'])
        ->name('expenses_print');

        Route::get('expenses/trash',[ExpenseController::class,'trash'])
        ->name('expenses.trash');

        Route::get('expenses/{id}/restore',[ExpenseController::class,'restore'])
        ->name('expenses.restore');

        Route::get('expenses/{id}/forcedelete',[ExpenseController::class,'forcedelete'])
        ->name('expenses.forcedelete');

        Route::resource('expenses',ExpenseController::class);


        //////////////////////Role///////////////

        //////////////////////report///////////////
        Route::post('search_invoices',[ReportController::class,'search_invoices'])->name('report_search_invoices');
        Route::resource('report',ReportController::class);

        Route::resource('roles',RoleController::class);


    });
        Route::get('company_invoice',[Company_invoice_reportController::class,'index'])->name('company_invoice_report');
        Route::post('search_company_invoice',[Company_invoice_reportController::class,'search_company_invoice'])->name('search_company_invoice');
        Route::get('invoice_report',[Invoice_reportController::class,'index'])->name('invoice_report');
        Route::post('search_invoice',[Invoice_reportController::class,'search_invoice'])->name('search_invoice');
        Route::get('/InvoiceDetails/{id}', [InvoiceDetailsController::class,'edit'])->name('edit');
        Route::get('/Company_invoice_details/{id}', [Company_invoice_detailsController::class,'edit'])->name('edit');
        Route::view('/','welcome')->name('site.index');

        Auth::routes();

         Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Route::view('not-allowed', 'not_allowed');

