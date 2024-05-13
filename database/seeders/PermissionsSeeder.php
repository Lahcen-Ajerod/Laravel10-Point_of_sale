<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
        [
            'pos.menu',
            'employee.menu',
            'employee.all',
            'employee.add',
            'employee.edit',
            'employee.delete',
            'customer.menu',
            'customer.all',
            'customer.add',
            'customer.edit',
            'customer.delete',
            'supplier.menu',
            'supplier.all',
            'supplier.add',
            'supplier.edit',
            'supplier.delete',
            'salary.menu',
            'salary.add',
            'salary.all',
            'salary.pay',
            'salary.paid',
            'attendence.menu',
            'category.menu',
            'product.menu',
            'orders.menu',
            'stock.menu',
            'roles.menu',
            'admin.menu',
            'expense.menu',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web', 'group_name' => 'All']);
        }
    }
}
