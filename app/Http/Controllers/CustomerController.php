<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\InternetPackage;
use App\Model\Location;
use App\Model\Setting;
use App\Repositories\CustomerHistoriesRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{


    /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\CustomerRepository
     */
    public $repository;

     /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\CustomerHistoriesRepository
     */
    public $historiesRepository;

    /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\TransactionRepository
     */
    public $transactionRepository;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository , CustomerHistoriesRepository $historiesRepository, TransactionRepository $transactionRepository)
    {
        $this->repository = $repository;
        $this->historiesRepository = $historiesRepository;
        $this->transactionRepository = $transactionRepository;
        $this->repository = $repository;
        $this->middleware('auth');
    }

    //APi


    public function Customer_api(){

        return response()->json(Customer::get(),200);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $locations = Location::all();
        $packages = InternetPackage::all();
        $settings = Setting::all();
        return view('customer.index',['packages' => $packages,'locations' => $locations,'settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        $packages = InternetPackage::all();
        $settings = Setting::all();
        return view('customer.create',['packages' => $packages,'locations' => $locations,'settings' => $settings]);

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
            'mobile'=> 'required',
            'address'=> 'required',
            'package_id' => 'required|integer',
            'zone_id' => 'required|integer'
        ]);
        $post = new Customer([
            'name'                  => $request->get('name'),
            'mobile'                => $request->get('mobile'),
            'address'               => $request->get('address'),
            'email'                 => $request->get('email'),
            'username'              => $request->get('username'),
            'package_id'            => $request->get('package_id'),
            'zone_id'               => $request->get('zone_id'),
            'connectionStatus'      => $request->get('connectionStatus'),
            'connectionMode'        => $request->get('$connectionMode'),
            'bandWidth'             => $request->get('bandWidth'),
            'assignBandWidth'       => $request->get('assignBandWidth'),
            'connectionDate'        => $request->get('connectionDate'),
            'monthlyBill'           => $request->get('monthlyBill'),
            'outstanding'           => $request->get('openingBalance'),
            'openingBalance'        => $request->get('openingBalance'),

        ]);
        $post->save();
        $this->historiesRepository->insertCustomerHistory($post);
        return redirect('/customer')->with('success', 'Customer has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ledger($id)
    {
        $data = $_REQUEST;
        $customer = Customer::find($id);
        $ledgers = $this->transactionRepository->getCustomerLedger($id,$data);
        return view('customer.ledger',['customer' => $customer,'ledgers' => $ledgers,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $packages = InternetPackage::all();
        $locations = Location::all();
        $settings = Setting::all();
        return view('customer.edit',['customer' => $customer,'packages' => $packages,'locations' => $locations,'settings' => $settings]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=> 'required',
            'address' => 'required',
            'package_id' => 'required|integer',
            'zone_id' => 'required|integer'
        ]);
        $post = Customer::find($id);
        $post->name = $request->get('name');
        $post->username = $request->get('username');
        $post->mobile = $request->get('mobile');
        $post->address = $request->get('address');
        $post->email = $request->get('email');
        $post->connectionStatus = $request->get('connectionStatus');
        $post->connectionMode = $request->get('connectionMode');
        $post->bandWidth = $request->get('bandWidth');
        $post->assignBandWidth = $request->get('assignBandWidth');
        $post->connectionDate = $request->get('connectionDate');
        $post->monthlyBill = $request->get('monthlyBill');
        $post->openingBalance = $request->get('openingBalance');
        $post->zone_id = $request->get('zone_id');
        $post->package_id = $request->get('package_id');
        $post->save();
        return redirect('/customer/edit/'.$id)->with('success', 'Customer has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Customer::find($id);
        $post->delete();
        return redirect('/customer')->with('success', 'Customer has been deleted Successfully');
    }


    public function dataTable(Request $request)
    {

        $query = $request->request->all();

        $countRecords =  DB::table('customers');
        $countRecords->select(DB::raw('count(*) as totalCustomer'));
        if(isset($query['customerName'])){
            $name = $query['customerName'];
            $countRecords->where('customers.name','like',"{$name}%");
        }
        if(isset($query['customerMobile'])){
            $mobile = $query['customerMobile'];
            $countRecords->where('customers.mobile','like',"{$mobile}%");
        }
        if(isset($query['customerUser'])){
            $user = $query['customerUser'];
            $countRecords->where('customers.username','like',"{$user}%");
        }
        if(isset($query['zoneId'])){
            $zoneId = $query['zoneId'];
            $countRecords->where('customers.zone_id',$zoneId);
        }
        if(isset($query['package_id'])){
            $package_id = $query['package_id'];
            $countRecords->where('customers.package_id',$package_id);
        }
        if(isset($query['connectionMode'])){
            $connectionMode = $query['connectionMode'];
            $countRecords->where('customers.connectionMode','like',"{$connectionMode}%");
        }
        if(isset($query['bandWidth'])){
            $bandWidth = $query['bandWidth'];
            $countRecords->where('customers.bandWidth','like',"{$bandWidth}%");
        }
        if(isset($query['assignBandWidth'])){
            $assignBandWidth = $query['assignBandWidth'];
            $countRecords->where('customers.assignBandWidth','like',"{$assignBandWidth}%");
        }
        if(isset($query['connectionStatus'])){
            $connectionStatus = $query['connectionStatus'];
            $countRecords->where('customers.connectionStatus','like',"{$connectionStatus}%");
        }

        $tcount = $countRecords->first();
        $iTotalRecords = $tcount->totalCustomer;
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $records = array();
        $records["data"] = array();
        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['name']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

        $rows = DB::table('customers');
        $rows->join('internet_packages', 'customers.package_id', '=', 'internet_packages.id');
        $rows->join('locations', 'customers.zone_id', '=', 'locations.id');
        $rows->leftJoin('settings as mode', 'customers.connectionMode', '=', 'mode.id');
        $rows->leftJoin('settings as bandWidth', 'customers.bandWidth', '=', 'bandWidth.id');
        $rows->leftJoin('settings as status', 'customers.connectionStatus', '=', 'status.id');
        $rows->leftJoin('settings as assignBandWidth', 'customers.assignBandWidth', '=', 'assignBandWidth.id');
        $rows->select('customers.name as name','customers.mobile as mobile','customers.username as username','customers.connectionDate as connectionDate','customers.outstanding as outstanding', 'internet_packages.name as package','internet_packages.price as amount');
        $rows->addSelect('locations.name as zone');
        $rows->addSelect('mode.name as connectionMode');
        $rows->addSelect('bandWidth.name as bandWidth');
        $rows->addSelect('assignBandWidth.name as assignBandWidth');
        $rows->addSelect('status.name as connectionStatus');
        if(isset($query['customerName'])){
            $name = $query['customerName'];
            $rows->where('customers.name','like',"{$name}%");
        }
        if(isset($query['customerMobile'])){
            $mobile = $query['customerMobile'];
            $rows->where('customers.mobile','like',"{$mobile}%");
        }
        if(isset($query['customerUser'])){
            $user = $query['customerUser'];
            $rows->where('customers.username','like',"{$user}%");
        }
        if(isset($query['zoneId'])){
            $zoneId = $query['zoneId'];
            $rows->where('customers.zone_id',$zoneId);
        }
        if(isset($query['package_id'])){
            $package_id = $query['package_id'];
            $countRecords->where('customers.package_id',$package_id);
        }
        if(isset($query['connectionMode'])){
            $connectionMode = $query['connectionMode'];
            $rows->where('customers.connectionMode','like',"{$connectionMode}%");
        }
        if(isset($query['bandWidth'])){
            $bandWidth = $query['bandWidth'];
            $rows->where('customers.bandWidth','like',"{$bandWidth}%");
        }
        if(isset($query['assignBandWidth'])){
            $assignBandWidth = $query['assignBandWidth'];
            $rows->where('customers.assignBandWidth','like',"{$assignBandWidth}%");
        }
        if(isset($query['connectionStatus'])){
            $connectionStatus = $query['connectionStatus'];
            $rows->where('customers.connectionStatus','like',"{$connectionStatus}%");
        }
        $rows->offset($iDisplayStart);
        $rows->limit($iDisplayLength);
        $rows->orderBy($columnName,$columnSortOrder);
        $result = $rows->get();
        $i = $iDisplayStart > 0  ? ($iDisplayStart+1) : 1;
        foreach ($result as $post):

            $records["data"][] = array(
                $id                 = $i,
                $name               = $post->name,
                $username           = $post->username,
                $mobile             = $post->mobile,
                $zone               = $post->zone,
                $package            = $post->package,
                $bandWidth          = $post->bandWidth,
                $connectionMode     = $post->connectionMode,
                $assignBandwidth    = $post->assignBandWidth,
                $connectionStatus   = $post->connectionStatus,
                $connectionDate     = date('d-m-Y',strtotime($post->connectionDate)),
                $outstanding            = $post->outstanding,
                "<div class='btn-group card-option'><button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-ellipsis-v'></i></button><ul class='list-unstyled card-option dropdown-info dropdown-menu dropdown-menu-right' x-placement='bottom-end'>
 <li class='dropdown-item'> <a href='/customer/show/{$id}' ><i class='feather icon-eye'></i> View</a></li>
<li class='dropdown-item'> <a href='/customer/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
<li class='dropdown-item'> <a  href='/customer/destroy/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
<li class='dropdown-item'> <a  href='/customer/ledger/{$id}'> <i class='feather icon-currency'></i> Ledger</a></li>
</ul></div>");
            $i++;

       endforeach;

        if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
            $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
            $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        return new JsonResponse($records);
    }
}
