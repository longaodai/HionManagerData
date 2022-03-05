<?php

namespace App\Http\Controllers;

use App\Services\Data\DataServiceInterface;
use App\Services\LogImport\LogImportServiceInterface;
use Illuminate\Http\Request;

class LogImportController extends Controller
{
    private $logImportService;

    public function __construct(LogImportServiceInterface $logImportService)
    {
        $this->logImportService = $logImportService;
    }
    
    public function index()
    {
        $data = $this->logImportService->getList();

        return view('pages.log_import.list', compact('data'));
    }

    public function update($code, $id)
    {
        $dataService = app(DataServiceInterface::class);
        $dataIds = $dataService->all(collect(['file_import' => $code]))->pluck('id')->toArray();
        $dataService->updateIn($dataIds);
        $this->logImportService->update([
            'status' => DATA_USE
        ], ['id' => $id]);

        return redirect()->route('admin.log_import.list')->with('msg', 'Cập nhật thành công');
    }

    public function hidden($code, $id)
    {
        $dataService = app(DataServiceInterface::class);
        $dataIds = $dataService->all(collect(['file_import' => $code]))->pluck('id')->toArray();
        $dataService->updateInHidden($dataIds);
        $this->logImportService->update([
            'status' => DATA_NOT_USE
        ], ['id' => $id]);

        return redirect()->route('admin.log_import.list')->with('msg', 'Cập nhật thành công');
    }
}
