<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\DataSaleImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Data\DataServiceInterface;
use App\Services\DataImport\DataImportServiceInterface;
use App\Services\LogImport\LogImportServiceInterface;
use Carbon\Carbon;

class DataController extends Controller
{
    private $dataService;

    public function __construct(DataServiceInterface $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index(Request $request)
    {
        $data = $this->dataService->getList(collect([
            'category' => $request->get('category'),
        ]));
        
        return view('pages.data', [
            'data' => $data,
        ]);
    }

    public function addCategoryData()
    {
        $this->dataService->addCategoryData(collect(['categoryNull' => true]));

        return redirect()->route('admin.view')->with('msg', 'Xử lý hoàn thành !!!');
    }

    public function addCategoryDataAll()
    {
        $this->dataService->addCategoryDataAll();

        return redirect()->route('admin.view')->with('msg', 'Xử lý hoàn thành !!!');
    }

    public function import()
    {
        return view('pages.import');
    }

    public function importCsv(Request $request)
    {
        $array = Excel::toArray(new DataSaleImport, $request->file('file_csv'));
        $nameFileDB = Str::random(LENGTH_RANDOM);
        $fileName = $request->file('file_csv')->getClientOriginalName();
        
        foreach (array_chunk($array[0],1000) as $arrayChild) {
            $data = [];
            foreach ($arrayChild as $item) {
                $data[] = [
                    'name_customer' => $item[0],
                    'phone' => $item[1],
                    'address' => $item[2],
                    'store' => $item[3],
                    'product' => $item[4],
                    'price' => $item[5],
                    'file_import' => $nameFileDB,
                    'status' => DATA_USE,
                ];
            }
            $dataImportService = app(DataImportServiceInterface::class);
            $dataImportService->insert($data);
        }
        
        
        $logImportService = app(LogImportServiceInterface::class);
        $logImportService->store([
            'file_import' => $fileName,
            'code' => $nameFileDB,
            'data_number' => count($data) ?? 0,
            'status' => DATA_USE,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('msg', 'Import data thành công');        
    }

    public function view()
    {
        return view('pages.handle.index');
    }
}
