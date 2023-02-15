<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelIdea\Helper\App\Models\_IH_User_QB;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Table\LaravelExcelException;

class Users extends AbstractTable
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
     * @return Builder|_IH_User_QB
     */
    public function for(): Builder|_IH_User_QB
    {
        return User::query();
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
            ->column('name', sortable: true)
            ->column('email', sortable: true)
            ->column(
                key: 'company.name',
                label: 'Azienda',
                sortable: true
            )
            ->column(label: 'Actions')
            ->selectFilter('company_id', [
                1 => '3D Automation',
                2 => 'SPH Technology',
            ],label: 'Azienda')
             ->withGlobalSearch(columns: ['name','email','company.name'])
//             ->bulkAction(
//                label: '↺ Aggiorna Timestamp',
//                each: fn (User $user) => $user->update(['name' => 'Pippo']),
//                after: fn () => Toast::success('Timestamps aggiornati con successo!')->autoDismiss(5),
//                confirm: true)
             ->export();
    }
}
