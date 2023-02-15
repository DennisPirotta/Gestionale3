<?php

namespace App\Tables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Table\LaravelExcelException;

class Customers extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        SpladeTable::defaultColumnCanBeHidden(false);
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @param Request $request
     * @return bool
     */
    public function authorize(Request $request): bool
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return Builder
     */
    public function for(): Builder
    {
        return Customer::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param SpladeTable $table
     * @return void
     * @throws LaravelExcelException
     */
    public function configure(SpladeTable $table): void
    {
        $table
            ->column('id', sortable: true)
            ->column('name', sortable: true)
            ->withGlobalSearch(columns: ['name'])
            ->column(label: 'Actions')
            ->bulkAction(
                label: 'Delete',
                each: fn (Customer $customer) => $customer->delete(),
                after: fn () => Toast::title('Customers deleted successfully')->message('All selected customers and their data have been deleted')->success()->autoDismiss(8),
                confirm: 'Delete Customers',
                confirmText: 'All selected customer data will be deleted, will still remain visible in the deleted customers section',
                confirmButton: 'Delete',
                cancelButton: 'Cancel'
            )
            ->export();
    }
}
