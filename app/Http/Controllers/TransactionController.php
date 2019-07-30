<?php

namespace App\Http\Controllers;

use App\Model\BillGenerate;
use App\Model\Customer;
use App\Model\InternetPackage;
use App\Model\Location;
use App\Model\Setting;
use App\Model\Transaction;
use App\Repositories\TransactionRepository;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\TransactionRepository
     */
    public $repository;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\TransactionRepository $repository
     */
    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        $packages = InternetPackage::all();
        $settings = Setting::all();
        $users = User::all();
        return view('transaction.index',['users' => $users,'packages' => $packages,'locations' => $locations,'settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $customers = Customer::all();
        $collections = User::all();
        $process = array("Paid","Receivable");
        $methods = array("Cash","bKash","Rocket","Nagad");
        return view('transaction.create',['customers' => $customers,'collections' => $collections,'process' => $process,'methods' => $methods]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->request->all();
        $request->validate([
            'amount'=>'required',
            'customer_id'=> 'required',
            'collection_id'=> 'required',
            'process'=> 'required',
            'paymentMethod'=> 'required'
        ]);
        $year = date("y");
        $month = $request->get('month');
        $customerId = $request->get('customer_id');
        $amount = $request->get('amount');
        $customer = Customer::find($customerId);
        $existTransaction = $this->repository->getFindExistMonth($customerId,$month,$year);
        if($existTransaction == "Valid"){
            $process = $request->get('process');
            $receivable = 0;
            $balance = 0;
            if($process === "Paid"){
                $receivable = $customer->monthlyBill;
                $balance = (($customer->outstanding + $customer->monthlyBill) - $amount);
            }elseif($process === "Receivable"){
                $receivable = ($customer->monthlyBill + $amount);
                $balance = ($customer->outstanding + $customer->monthlyBill + $amount);
            }

            $post = new Transaction([
                'amount' => $amount,
                'customer_id'=> $customerId,
                'collection_id'=> $request->get('collection_id'),
                'process'=> $process,
                'month'=> $request->get('month'),
                'year'=> $year,
                'receivable' => floatval($receivable),
                'balance' => floatval($balance),
                'paymentMethod'=> $request->get('paymentMethod'),
                'paymentMobile'=> $request->get('paymentMobile'),
                'transactionId'=> $request->get('transactionId'),
                'remark' => $request->get('remark')
            ]);
            $post->save();
            $this->repository->billTransactionOutstanding($customer,$month,$year);
            return redirect('/transaction/create')->with('success', 'Transaction has been added successfully');
        }else{
            return redirect('/transaction/create')->with('warning', 'This payment month already exist');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function billGenerate()
    {
        $zones = Location::all();
        $collections = User::all();
        $packages = InternetPackage::all();
        return view('transaction.billGenerate',['zones' => $zones,'collections' => $collections,'packages' => $packages]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function billGenerateCreate(Request $request)
    {
        $request->validate([
            'zone_id'=> 'required',
        ]);
        $year = date("y");
        $time = strtotime(date("d-m-Y"));
        $month = date("F", strtotime("-1 month", $time));
        $zone = $request->get('zone_id');

        $exist = DB::table('bill_generates')
            ->where(array('zone_id'=> $zone,'billMonth'=>$month,'billYear'=>$year))
            ->first();
        if(empty($exist)){
            $post = new BillGenerate([
                'zone_id' => $request->get('zone_id'),
                'package_id'=> $request->get('package_id'),
                'collection_id'=> $request->get('collection_id'),
                'billMonth' => $month,
                'billYear' => $year,
            ]);
            $post->save();
            $this->repository->billGenerate($post);
            return redirect('/transaction')->with('success', 'Bill generation has been generated Successfully');
        }
        return redirect('/transaction/generate')->with('warning', 'This zone already bill generated');
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
        $post = Transaction::find($id);

        return view('transaction.edit', compact('post'));
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
            'price'=> 'required|integer',
        ]);

        $post = Transaction::find($id);
        $post->name = $request->get('name');
        $post->price = $request->get('price');
        $post->youtube = $request->get('youtube');
        $post->bdix = $request->get('bdix');
        $post->akamai = $request->get('akamai');
        $post->facebook = $request->get('facebook');
        $post->ftp = $request->get('ftp');
        $post->transaction = $request->get('transaction');
        $post->description = $request->get('description');
        $post->save();
        return redirect('/transaction')->with('success', 'transaction package has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Transaction::find($id);
        $post->delete();
        return redirect('/transaction')->with('success', 'transaction package has been deleted Successfully');
    }


    public function dataTable(Request $request)
    {


        $query = $request->request->all();


        $countRecords =  DB::table('transactions');
        $countRecords->join('customers', 'transactions.customer_id', '=', 'customers.id');
        $countRecords->leftJoin('internet_packages', 'transactions.package_id', '=', 'internet_packages.id');
        $countRecords->select(DB::raw('count(*) as totalCustomer'));
        if(isset($query['updated'])){
            $updated = $query['updated'];
            $startDate = date("Y-m-d 00:00:00",strtotime($updated));
            $endDate = date("Y-m-d 23:59:59",strtotime($updated));
            $countRecords->whereBetween('transactions.updated_at', [$startDate,$endDate]);
        }
        if(isset($query['customerName'])){
            $name = $query['customerName'];
            $countRecords->where('customers.name','like',"{$name}%");
        }
        if(isset($query['customerMobile'])){
            $mobile = $query['customerMobile'];
            $countRecords->where('customers.mobile','like',"{$mobile}%");
        }
        if(isset($query['zoneId'])){
            $zoneId = $query['zoneId'];
            $countRecords->where('customers.zone_id',$zoneId);
        }
        if(isset($query['packageId'])){
            $package_id = $query['packageId'];
            $countRecords->where('transactions.package_id',$package_id);
        }
        if(isset($query['month'])){
            $month = $query['month'];
            $countRecords->where('transactions.month','like',"{$month}%");
        }
        if(isset($query['process'])){
            $process = $query['process'];
            $countRecords->where('transactions.process','like',"{$process}%");
        }

        if(isset($query['balance'])){
            $balance = $query['balance'];
            $countRecords->where('transactions.process','>=',"{$balance}");
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


        $posts = DB::table('transactions');
        $posts->join('customers', 'transactions.customer_id', '=', 'customers.id');
        $posts->leftJoin('users', 'transactions.collection_id', '=', 'users.id');
        $posts->leftJoin('locations', 'customers.zone_id', '=', 'locations.id');
        $posts->leftJoin('internet_packages', 'customers.package_id', '=', 'internet_packages.id');
        $posts->select('customers.name','customers.mobile as mobile','customers.name as name','customers.monthlyBill as monthlyBill','customers.outstanding as outstanding','customers.zone_id as zoneId');
        $posts->addSelect('transactions.id as id','transactions.updated_at as updated','transactions.amount as amount','transactions.process as process','transactions.month as month','transactions.year as year','transactions.package_id as packageId','transactions.collection_id as collectionId');
        $posts->addSelect('internet_packages.name as packageName');
        $posts->addSelect('locations.name as zone');
        $posts->addSelect('users.name as collectionName');

            if(isset($query['updated'])){
                $updated = $query['updated'];
                $startDate = date("Y-m-d 00:00:00",strtotime($updated));
                $endDate = date("Y-m-d 23:59:59",strtotime($updated));
                $posts->whereBetween('transactions.updated_at', [$startDate,$endDate]);
            }
            if(isset($query['customerName'])){
                $name = $query['customerName'];
                $posts->where('customers.name','like',"{$name}%");
            }
            if(isset($query['customerMobile'])){
                $mobile = $query['customerMobile'];
                $posts->where('customers.mobile','like',"{$mobile}%");
            }
            if(isset($query['zoneId'])){
                $zoneId = $query['zoneId'];
                $posts->where('customers.zone_id',$zoneId);
            }
            if(isset($query['packageId'])){
                $package_id = $query['packageId'];
                $posts->where('transactions.package_id',$package_id);
            }
             if(isset($query['collectionId'])){
                $collectionId = $query['collectionId'];
                $posts->where('transactions.collection_id',$collectionId);
            }
            if(isset($query['month'])) {
                $month = $query['month'];
                $year = date('y');
                $posts->where(['transactions.month' => "{$month}",'transactions.year' => "{$year}"]);
            }
            if(isset($query['balance'])){
                $balance = $query['balance'];
                $posts->where('transactions.process','>=',"{$balance}");
            }

            if(isset($query['process'])){
                $process = $query['process'];
                $posts->where('transactions.process','like',"{$process}%");
            }
        $posts->offset($iDisplayStart);
        $posts->limit($iDisplayLength);
        $posts->orderBy($columnName,$columnSortOrder);
        $result = $posts->get();
        $i = $iDisplayStart > 0  ? ($iDisplayStart+1) : 1;
        foreach ($result as $post){

            $id = $post->id;
            $paymentMonth = $post->month.','.$post->year;
            $action = "";
            if($post->process == "In-progress"){
                $action = "<div class='btn-group card-option'>
                            <button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                            </button>
                            <ul class='list-unstyled card-option dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(53px, 41px, 0px);'>
 <li class='dropdown-item full-card'> <a href='/transaction/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
 <li class='dropdown-item full-card'> <a href='/transaction/show/{$id}'> <i class='feather icon-eye'></i> View</a></li>
<li class='dropdown-item full-card'> <a  href='/transaction/destroy/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
</ul></div>";
            }else{
                $action = "<div class='btn-group card-option'>
                            <button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                            </button>
                            <ul class='list-unstyled card-option dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(53px, 41px, 0px);'>
 <li class='dropdown-item full-card'> <a href='/transaction/show/{$id}'> <i class='feather icon-eye'></i> View</a></li>
</ul></div>";
            }

            $records["data"][] = array(
                $i,
                $date =  date('d-m-Y',strtotime($post->updated)),
                $name =  $post->name,
                $mobile =  $post->mobile,
                $packageName = $post->packageName,
                $username =  $post->collectionName,
                $zone =  $post->zone,
                $monthlyBill = $post->monthlyBill,
                $paymentMonth,
                $amount = $post->amount,
                $outstanding = $post->outstanding,
                $process = $post->process,
                $action

            );
            $i++;
        }

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
