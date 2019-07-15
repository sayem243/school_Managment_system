<?php

namespace App\Http\Controllers;

use App\Model\InternetPackage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internet.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('internet.create');
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
            'price'=> 'required'
        ]);
        $post = new InternetPackage([
            'name' => $request->get('name'),
            'price'=> $request->get('price'),
            'youtube'=> $request->get('youtube'),
            'bdix'=> $request->get('bdix'),
            'akamai'=> $request->get('akamai'),
            'facebook'=> $request->get('facebook'),
            'ftp'=> $request->get('ftp'),
            'internet'=> $request->get('internet'),
            'description'=> $request->get('description')
        ]);
        $post->save();
        return redirect('/internet')->with('success', 'Internet package has been added');

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
        $post = InternetPackage::find($id);

        return view('internet.edit', compact('post'));
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

        $post = InternetPackage::find($id);
        $post->name = $request->get('name');
        $post->price = $request->get('price');
        $post->youtube = $request->get('youtube');
        $post->bdix = $request->get('bdix');
        $post->akamai = $request->get('akamai');
        $post->facebook = $request->get('facebook');
        $post->ftp = $request->get('ftp');
        $post->internet = $request->get('internet');
        $post->description = $request->get('description');
        $post->save();
        return redirect('/internet')->with('success', 'Internet package has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = InternetPackage::find($id);
        $post->delete();
        return redirect('/internet')->with('success', 'Internet package has been deleted Successfully');
    }


    public function dataTable(Request $request)
    {

        $data = $request->all();

        $posts = InternetPackage::all();

        $iTotalRecords =  DB::table('internet_packages')->count();
        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;
        foreach ($posts as $post){

            $records["data"][] = array(
                $id = $post->id,
                $name =  $post->name,
                $amount = $post->price,
                $youtube = $post->youtube,
                $bdix = $post->bdix,
                $akamai = $post->akamai,
                $facebook = $post->facebook,
                $ftp = $post->ftp,
                $internet = $post->internet,
                $description = $post->description,
                "<div class='btn-group card-option'>
                            <button type='button' class='btn btn-notify' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='fas fa-ellipsis-v'></i>
                            </button>
                            <ul class='list-unstyled card-option dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(53px, 41px, 0px);'>
 <li class='dropdown-item full-card'> <a href='/internet/edit/{$id}'> <i class='feather icon-edit'></i> Edit</a></li>
<li class='dropdown-item full-card'> <a  href='/internet/destroy/{$id}'> <i class='feather icon-trash-2'></i> Remove</a></li>
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
