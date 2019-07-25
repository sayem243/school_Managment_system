<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\InternetPackage;
use App\Model\Location;
use App\Repositories\CustomerRepository;
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
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = InternetPackage::all();
        $locations = Location::all();

        $connectionStatus = array("Create","Active","Hold","In-active");
        $connectionModes = array("Home","Mess","Office","Shop","Restaurant","Jim","Coaching","Institution","Government Office","Diagnostic","Hospital","Medicine");
        $bandwidthTypes = array("Shared","Dedicated","Dedicated + IP");
        $assignBandwidth = array("512 Kb","1.0 Mbps","1.5 Mbps","2.0 Mbps","2.5 Mbps","3.0 Mbps","3.5 Mbps","4.0 Mbps","4.5 Mbps","5.0 Mbps","5.5 Mbps","1.0 Mbps");
        return view('customer.create',['customer' => '','packages' => $packages,'locations' => $locations,'connectionStatus' => $connectionStatus,'bandwidthTypes' => $bandwidthTypes,'connectionModes' => $connectionModes,'assignBandwidths' => $assignBandwidth]);
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
            'name'          => $request->get('name'),
            'mobile'        => $request->get('mobile'),
            'address'       => $request->get('address'),
            'package_id'    => $request->get('package_id'),
            'username'    => $request->get('username'),
            'connectionStatus'    => $request->get('connectionStatus'),
            'connectionMode'    => $request->get('$connectionMode'),
            'bandWidth'    => $request->get('bandWidth'),
            'assignBandWidth'    => $request->get('assignBandWidth'),
            'connectionDate'    => $request->get('connectionDate'),
            'monthlyBill'    => $request->get('monthlyBill'),
            'outstanding'    => $request->get('openingBalance'),
            'openingBalance'    => $request->get('openingBalance'),
            'zone_id'    => $request->get('zone_id'),
            'email'         => $request->get('email'),

        ]);
        $post->save();
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

        $connectionStatus = array("Create","Active","Hold","In-active");
        $connectionModes = array("Home","Mess","Office","Shop","Restaurant","Jim","Coaching","Institution","Government Office","Diagnostic","Hospital","Medicine");
        $bandwidthTypes = array("Shared","Dedicated","Dedicated + IP");
        $assignBandwidth = array("512 Kb","1.0 Mbps","1.5 Mbps","2.0 Mbps","2.5 Mbps","3.0 Mbps","3.5 Mbps","4.0 Mbps","4.5 Mbps","5.0 Mbps","5.5 Mbps","1.0 Mbps");
        return view('customer.edit',['customer' => $customer,'packages' => $packages,'locations' => $locations,'connectionStatus' => $connectionStatus,'bandwidthTypes' => $bandwidthTypes,'connectionModes' => $connectionModes,'assignBandwidths' => $assignBandwidth]);

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

        $iTotalRecords =  DB::table('customers')->count();
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $rows = DB::table('customers')
            ->join('internet_packages', 'customers.package_id', '=', 'internet_packages.id')
            ->join('locations', 'customers.zone_id', '=', 'locations.id')
            ->select('customers.*', 'internet_packages.name as package','internet_packages.price as amount')
            ->addSelect('locations.name as zone')
            ->offset($iDisplayStart)
            ->limit($end)
            ->get();

        foreach ($rows as $post):

            $records["data"][] = array(
                $id                 = $post->id,
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
                $monthlyBill            = $post->monthlyBill,
                $outstanding            = $post->outstanding,
                "<div class='btn-group card-option'><button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-ellipsis-v'></i></button><ul class='list-unstyled card-option dropdown-info dropdown-menu dropdown-menu-right' x-placement='bottom-end'>
 <li class='dropdown-item'> <a href='/customer/show/{$id}' ><i class='feather icon-eye'></i> View</a></li>
<li class='dropdown-item'> <a href='/customer/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
<li class='dropdown-item'> <a  href='/customer/destroy/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
</ul></div>");

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
