<?php

namespace Database\Seeders;

use App\Models\Apility;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $apility = [
        'all_doctor' => 'جميع الموظفين',
        'add_doctor' => 'اضافة موظف جديد',
        'delete_doctor' => 'حذف موظف',
        'edit_doctor' => 'تعديل موظف',
        'all_patient' => 'جميع المرضى الخاصة بالموظف',
        'add_patient' => 'اضافة مريض جديد',
        'delete_patient' => 'حذف مريض',
        'edit_patient' => 'تعديل المريض',
        'all_apponment' => 'جميع الحجوزات',
        'add_apponment' => 'اضافة حجز',
        'delete_apponment' => 'حذف حجز ',
        'edit_apponment' => 'تعديل حجز',
        'all_medicine' => 'جميع الخدمات',
        'add_medicine' => 'اضافة خدمة',
        'delete_medicine' => 'حذف خدمة',
        'edit_medicine' => 'تعديل خدمة',
        'all_medical_bill' => 'جميع الكشفيات',
        'add_medical_bill' => 'اضافة كشفية',
        'delete_medical_bill' => 'حذف كشفية',
        'edit_medical_bill' => 'تعديل كشفية',
        'all_invoice' => 'جميع الفواتير ',
        'add_invoice' => 'اضافة فاتورة ',
        'delete_invoice' => 'حذف فاتورة ',
        'edit_invoice' => 'تعديل فاتورة ',
        'paid_invoice' => 'فواتير مدفوعة ',
        'unpaid_invoice' => 'فواتير الغير مدفوعة ',
        'partial_invoice' => 'الفواتير مدفوعة جزئيا ',
        'all_company_invoice' => 'جميع الفواتير الخارجية ',
        'add_company_invoice' => 'اضافة فاتورة خارجية ',
        'delete_company_invoice' => 'حذف فاتورة خارجية ',
        'edit_company_invoice' => 'تعديل فاتورة خارجية ',
        'paid_company_invoice' => 'فواتير الخارجية مدفوعة ',
        'unpaid_company_invoice' => 'فواتير الخارجية الغير مدفوعة ',
        'partial_company_invoice' => 'الفواتير الخارجية مدفوعة جزئيا ',
        'all_expense' => 'جميع المصاريف',
        'add_expense' => 'اضافة مصروف',
        'delete_expense' => 'حذف مصروف',
        'edit_expense' => 'تعديل مصروف',
        'all_report' => 'جميع التقارير',
    ];
    public function run()
    {
        $data = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
            ['name' => 'user'],
        ];
        Role::insert($data);
            foreach($this->apility as $code =>$name){
                Apility::create([

                    'name' => $name,
                    'code' => $code
                ]);
}
    }
}
