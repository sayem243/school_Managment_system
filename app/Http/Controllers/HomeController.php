<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\TransactionRepository
     */
    public $repository;

     /**
     * The CustomerRepository instance.
     *
     * @var \App\Repositories\CustomerRepository
     */
    public $customerRepository;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\TransactionRepository $repository
     * @param  \App\Repositories\CustomerRepository $customerRepository
     */
    public function __construct(TransactionRepository $repository , CustomerRepository $customerRepository)
    {
        $this->repository = $repository;
        $this->customerRepository = $customerRepository;
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $customers = $this->customerRepository->customerOverview();
        $locationBaseCustomers = $this->customerRepository->zoneBaseCustomerOverview();
        $todayCollection = $this->repository->todayCollection();
        $monthlyCollection = $this->repository->monthlyCollection();
        $monthlyBill = $this->customerRepository->monthlyBill();

        return view('dashboard',['customers' => $customers,'locationBaseCustomers' => $locationBaseCustomers,'todayCollection' => $todayCollection,'monthlyCollection' => $monthlyCollection,'monthlyBill' => $monthlyBill]);
    }
}
