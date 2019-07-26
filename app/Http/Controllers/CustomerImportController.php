<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Model\CustomerImport;
use App\Model\InternetPackage;
use App\Repositories\CustomerHistoriesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CustomerImportController extends Controller
{

    /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\CustomerHistoriesRepository
     */
    public $historiesRepository;

    /**
     * Create a new PostController instance.
     */
    public function __construct(CustomerHistoriesRepository $historiesRepository)
    {
        $this->middleware('auth');
        $this->historiesRepository = $historiesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities  = CustomerImport::all();
        return view('customer.import', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('customer.importForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'file'=> 'required'
        ]);
        $file = $request->file('file');

       /* //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();*/


        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $user = auth()->user()->id;
        $post = new CustomerImport([
            'user_id' => $user,
            'name' => $request->get('name'),
            'file'=> $file->getClientOriginalName(),
        ]);
        $post->save();
        return redirect('/customer/import')->with('success', 'Customer import has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportFile($id)
    {
        $post = CustomerImport::find($id);
        $file = $post->file;
        $source = public_path("/uploads/{$file}");
        Excel::import(new CustomerExport(), $source);

        return redirect('/customer/import')->with('success', 'Customer export has been success');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function importFile($id)
    {
        $post = CustomerImport::find($id);
        $file = $post->file;
        $source = public_path("/uploads/{$file}");
        Excel::import(new \App\Imports\CustomerImport(), $source);
        $this->historiesRepository->insertImportCustomerHistory();
        DB::table('customer_imports')->where('id',$id)->update([ 'process' => 'Imported']);
        return redirect('/customer/import')->with('success', 'Customer import has been success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = CustomerImport::find($id);
        $post->delete();
        return redirect('/customer/import')->with('success', 'Customer import delete has been deleted Successfully');
    }

}
