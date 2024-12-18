<?php

namespace App\Http\Controllers\Admin;


use App\Exports\IrisExport;
use App\Imports\IrisImport;
use Illuminate\Http\Request;
use App\Exports\MtcarsExport;
use App\Imports\MtcarsImport;
use App\Exports\MergedSheetExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ExcelExportRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ExcelExportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExcelExportCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ExcelExport::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/excel-export');
        CRUD::setEntityNameStrings('excel export', 'excel exports');
        $this->crud->addButtonFromView('line', 'download_excel', 'download_excel', 'end');
        $this->crud->addButtonFromView('top', 'upload_excel', 'upload_excel', 'end');

    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ExcelExportRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function exportIris()
    {
        return Excel::download(new IrisExport, 'iris_data.xlsx');
    }

    /**
     * Export the Mtcars dataset as an Excel file.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportMtcars()
    {
        return Excel::download(new MtcarsExport, 'mtcars_data.xlsx');
    }

    public function import(Request $request)
    {
        // Validate that the file is an Excel file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        // Import iris data
        Excel::import(new IrisImport, $request->file('file'));

        // Import mtcars data (optional, based on your use case)
        Excel::import(new MtcarsImport, $request->file('file'));

        return back()->with('success', 'Data imported successfully.');
    }
}
