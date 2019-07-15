<?php

namespace App\Http\Controllers;


use App\Model\Location;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LocationController extends Controller
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
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('location.index');
    }

    public function locationTree($selectedItem = 0, $parent = 0, $sub_mark = '')
    {

        $result = DB::table('locations as l')
            ->select('l.id as id', 'l.name as name', 'l.parent')
            ->orderBy('l.id', 'ASC')
            ->where('l.parent', $parent)
            ->get()->toArray();
        $data = "";
        if (count($result) > 0) {
            foreach ($result as $row):
                $selected = $selectedItem == $row->id ? 'selected="selected"':"";
                $data .= "<option {$selected} value='{$row->id}'>{$sub_mark}{$row->name}</option>";
                $data .= $this->locationTree($selectedItem,$row->id, $sub_mark . '---');
            endforeach;
        }
        return $data;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trees = $this->locationTree();
        $types = array("Zone","Thana/Upozila","Union","Ward","Unit","Village");
        return view('location.create', ['trees' => $trees,'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_type' => 'required',
        ]);
        $post = new Location([
            'name' => $request->get('name'),
            'parent' => $request->get('parent'),
            'location_type' => $request->get('location_type'),
            'parent' => $request->get('parent'),

        ]);
        $post->save();
        return redirect('/location')->with('success', 'Location has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Location::find($id);
        $trees = $this->locationTree($post->parent);
       // $types = array("Zone","Thana/Upozila","Union","Ward","Unit","Village");
        $types = array("Zone","Thana/Upozila","Union","Ward","Unit","Village");
        return view('location.edit', compact('post'), ['types' => $types ,'trees' => $trees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location_type' => 'required',
        ]);

        $post = Location::find($id);
        $post->name = $request->get('name');
        $post->location_type = $request->get('location_type');
        $post->parent = $request->get('parent');
        $post->save();
        return redirect('/location')->with('success', 'Customer has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Location::find($id);
        $post->delete();
        return redirect('/location')->with('success', 'Location has been deleted Successfully');
    }

    public function parentList($type)
    {
        $rows = DB::table('locations as l')
            ->select('l.id as id', 'l.name as name')
            ->orderBy('l.id', 'ASC')
            ->where('l.location_type', $type)
            ->get();
        $data = "";
        $data .= "<option value=''>Choose a location parent</option>";
        foreach ($rows as $row) {
            $data .= "<option value='{$row->id}'>{$row->name}</option>";
        }
        return new JsonResponse($data);

    }

    public function dataTable(Request $request)
    {

        $iTotalRecords = DB::table('locations')->count();
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $rows = DB::table('locations as l')
            ->leftJoin('locations as pl', 'l.parent', '=', 'pl.id')
            ->select('l.*', 'pl.name as parent_name')
            ->offset($iDisplayStart)
            ->limit($end)
            ->orderBy('l.id', 'ASC')
            ->get();
        foreach ($rows as $post):
            $records["data"][] = array(
                $id = $post->id,
                $name = $post->name,
                $parentName = $post->parent_name,
                $type = ucfirst($post->location_type),
                "<div class='btn-group card-option'><button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-ellipsis-v'></i></button><ul class='list-unstyled card-option dropdown-info dropdown-menu dropdown-menu-right' x-placement='bottom-end'>
 <li class='dropdown-item'> <a href='/location/show/{$id}' ><i class='feather icon-eye'></i> View</a></li>
<li class='dropdown-item'> <a href='/location/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
<li class='dropdown-item'> <a  href='/location/destroy/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
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
