<?php

namespace App\Http\Controllers;

use App\Model\Share;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();
        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
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
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
        ]);
        $share = new Share([
            'share_name' => $request->get('share_name'),
            'share_price'=> $request->get('share_price'),
            'share_qty'=> $request->get('share_qty')
        ]);
        $share->save();
        return redirect('/shares')->with('success', 'Stock has been added');

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
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
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
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
        ]);

        $share = Share::find($id);
        $share->share_name = $request->get('share_name');
        $share->share_price = $request->get('share_price');
        $share->share_qty = $request->get('share_qty');
        $share->save();

        return redirect('/shares')->with('success', 'Stock has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();
        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }


    public function dataTable(Request $request)
    {

        $data = $request->all();
        $iTotalRecords = 200;
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;
        $name_list = array(
            array("Shafiq" => "Shafiq"),
            array("Sumon" => "Sumon"),
            array("Ram Prashad" => "Ram Prashad"),
            array("Arafat" => "Arafat"),
            array("Robin" => "Robin"),
            array("Umar" => "Umar"),
            array("Zunu" => "Zunu")
        );

        $corporate_list = array(
            array("dark" => "Unilever"),
            array("green-haze" => "Sanowara"),
            array("blue-hoki" => "UCBL"),
            array("danger" => "Dhaka Bank"),
            array("yellow-mint" => "AKS"),
            array("purple-sharp" => "Square"),
            array("red-mint" => "Opsonin")
        );

        $location_list = array(
            array("Barishal" => "Barishal"),
            array("Pirojpur" => "Pirojpur"),
            array("Mathbaria" => "Mathbaria"),
            array("Netrokona" => "Netrokona"),
            array("Sathkhira" => "Sathkhira"),
            array("Dhaka" => "Dhaka"),
            array("Khulna" => "Khulna")
        );
        $status_list = array(
            array("blue-bg" => "Created"),
            array("green-bg" => "In-progress"),
            array("indigo-bg" => "Delivered"),
            array("red-bg" => "Received"),
            array("yellow-bg" => "Schedule"),
            array("purple-bg" => "Returned"),
            array("orange-bg" => "Damage")
        );

        for($i = $iDisplayStart; $i < $end; $i++) {
            $status = $status_list[rand(0, 2)];
            $name = $name_list[rand(0, 2)];
            $location = $location_list[rand(0, 2)];
            $corporate = $corporate_list[rand(0, 2)];
            $id = ($i + 1);
            $records["data"][] = array(
                $id,
                rand(1, 30).'/10/2018',
                rand(100000, 999999),
                rand(100000, 999999),
                current($corporate),
                current($name),
                '01711'.rand(100000, 999999),
                current($location),
                rand(1, 30).'/10/2018',
                rand(1, 5).'Days',
                "<div class='btn-group card-option'>
                            <button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                            </button>
                            <ul class='list-unstyled card-option dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(53px, 41px, 0px);'>
 <li class='dropdown-item full-card'> <a href='/shares/show/{$id}' ><i class='feather icon-eye'></i> View</a></li>
<li class='dropdown-item full-card'> <a href='/shares/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
<li class='dropdown-item full-card'> <a  href='/shares/delete/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
</ul></div>",
            );
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
