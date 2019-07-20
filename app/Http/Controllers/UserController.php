<?php

namespace App\Http\Controllers;

use App\Model\InternetPackage;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class UserController extends Controller
{

    /**
     * Create a new PostController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.create');
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
            'email'=>'required',
            'username'=> 'required|max:255',
            'mobile'=> 'required|max:255'
        ]);

        $post = new User([
            'name' => $request->get('name'),
            'username'=> $request->get('username'),
            'mobile'=> $request->get('mobile'),
            'email'=> $request->get('email'),
            'password' => bcrypt($request->get('password')),

        ]);
        $post->save();
        return redirect('/user')->with('success', 'Internet package has been added');

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'mobile' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
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

}
