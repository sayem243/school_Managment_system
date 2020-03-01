<?php

namespace App\Http\Controllers;

use App\admin;
use App\Section;
use App\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

//use DB;

class AdminController extends Controller
{
    public function create(){

        $classnames=Studentclass::all();
        $sections = Section::all();

        return view('admin.studentCreate',['classnames'=>$classnames ,'sections'=>$sections]);
    }


     public function store( Request $request){

        $Student= new admin;

        $Student->student_name=$request->student_name;
        $Student->fname=$request->fname;
        $Student->studentclasses_id=$request->studentclasses_id;
        $Student->section=$request->section;
        $Student->email=$request->email;
        $Student->dob=$request->dob;
        $Student->mothername=$request->mothername;
        $Student->gender=$request->gender;
        $Student->father_occupation=$request->father_occupation;

        $Student->present_address=$request->present_address;
        $Student->permanent_address=$request->permanent_address;

        $Student->father_mobile=$request->father_mobile;
        $Student->mother_mobile=$request->mother_mobile;
        $Student->emergency_number=$request->emergency_number;
        $Student->bloodGroup=$request->bloodGroup;

         if($request->hasFile('photo')){
             $Student->photo = $request->photo->store('public/images');
         }

      /* start auto generted */
 $startOfYear = Carbon::now()->startOfYear();
 $endOfYear = Carbon::now()->endOfYear();
 $students = admin::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->get();
 $count = count($students) + 1;
 ///$student = admin::create($request->all());

 $Student->id_no = Carbon::now()->toDateString(). $count;

      /*   End of Auto generated*/

        //var_dump($Student);die;
         $Student->save();
        return redirect()->route('student_create');
    }

    public function indexOne(){

        $admins = admin::all();
        $class =Studentclass::all();

        // print_r($admins);
        return view('admin.index',['admins'=>$admins , 'classes'=>$class]);
    }

    public function indexTwo(){

       $admins = DB::table('admins')
            ->select(DB::raw('*'))
            ->where('studentclasses_id','=',2)
            ->get();
        // print_r($admins);
             return view('admin.indexTwo',['admins'=>$admins]);
    }

    public function View ($id){
        $details=admin::find($id);
        //$sections = Section::all();

        return view('admin.details',['details'=>$details ]);

    }


    public function dataTable(Request $request){

        $query = $request->request->all();
        $countRecords =  DB::table('admins');
        $countRecords->select(DB::raw('count(*) as totalStudent'));
        if(isset($query['studentName'])){
            $name = $query['studentName'];
            $countRecords->where('admins.student_name','like',"{$name}%");
        }
        if(isset($query['id_no'])){
            $id_no=$query['id_no'];
            $countRecords->where('admins.id_no','like',"{$id_no}%");
        }

        if(isset($query['ClassID'])){
            $ClassID=$query['ClassID'];
            $countRecords->where('admins.studentclasses_id','like',$ClassID);
        }
        if(isset($query['emergency_number'])){
            $emergency_number=$query['emergency_number'];
            $countRecords->where('admins.emergency_number','like',"{$emergency_number}%");
        }

        $tcount = $countRecords->first();
        $iTotalRecords = $tcount->totalStudent;
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

        $rows = DB::table('admins');
        $rows->select('admins.student_name as name','admins.id_no as studentID','admins.emergency_number as emergency_number');
        $rows->join('studentclasses', 'admins.studentclasses_id', '=', 'studentclasses.id');
        $rows->addSelect('studentclasses.class_name as class');

        if(isset($query['studentName'])){
            $name = $query['studentName'];
            $rows->where('admins.student_name','like',"{$name}%");
        }

        if(isset($query['id_no'])){
            $id_no=$query['id_no'];
            $rows->where('admins.id_no','like',"{$id_no}%");
        }

        if(isset($query['ClassID'])){
            $ClassID=$query['ClassID'];
            $rows->where('admins.studentclasses_id','like',$ClassID);
        }

        if(isset($query['emergency_number'])){
            $emergency_number=$query['emergency_number'];
            $rows->where('admins.emergency_number','like',"{$emergency_number}%");
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
                $id_no              = $post->studentID,
                $ClassID            = $post->class,
                $emergency_number   = $post->emergency_number,
);
            $i++;
        endforeach;

//       if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
//            $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
//            $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
//        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        return new JsonResponse($records);

    }

}
