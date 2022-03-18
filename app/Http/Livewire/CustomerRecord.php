<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class CustomerRecord extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput();
        //->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\User>|null
     */
    public function datasource(): ?Builder
    {
        return Customer::query()->where('user_id', auth()->user()->id)->orderByDesc('created_at');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            //->addColumn('id')
             ->addColumn('user_id')
            ->addColumn('cname')
            ->addColumn('cemail')
            ->addColumn('cphone')
            ->addColumn('state')
            ->addColumn('district')
            ->addColumn('localLevel')
            ->addColumn('status');
        // ->addColumn('created_at_formatted', function(Customer $model) {
        //     return Carbon::parse($model->created_at)->format('d/m/Y H:i:s');
        // })
        // ->addColumn('updated_at_formatted', function(Customer $model) {
        //     return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
        // });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()

                ->title('USER ID')
                ->field('user_id')
                ->searchable(),
            Column::add()

                ->title('CNAME')
                ->field('cname')
                ->searchable(),



            Column::add()
                ->title('CEMAIL')
                ->field('cemail')
                ->searchable(),

            Column::add()
                ->title('CPHONE')
                ->field('cphone')
                ->searchable(),

            Column::add()
                ->title('STATE')
                ->field('state')
                ->sortable()
                ->searchable(),



            Column::add()
                ->title('DISTRICT')
                ->field('district')
                ->sortable()
            ->searchable(),
            // ->makeInputText(),

            Column::add()
                ->title('LOCALLEVEL')
                ->field('localLevel')
                ->sortable()
                ->searchable(),
            // ->searchable()
            // ->makeInputText(),

            Column::add()
                ->title('STATUS')
                ->field('status'),
            // ->toggleable(),


        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Customer Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */


    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('<i class="bi bi-pencil-square text-success"></i>')
                ->class('text-primary cursor-pointer text-white rounded text-sm disabled')
                ->route('costumer.edit', ['costumer' => 'id']),

            Button::add('destroy')
                ->caption('<i class="bi bi-trash-fill text-danger"></i>')
                ->class('text-danger cursor-pointer text-white rounded text-sm disabled')
                ->route('costumer.destroy', ['costumer' => 'id'])
                ->method('delete'),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Customer Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($customer) => $customer->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

    /**
     * PowerGrid Customer Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Customer::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}