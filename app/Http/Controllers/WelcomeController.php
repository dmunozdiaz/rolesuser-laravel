<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\User;


class WelcomeController extends Controller
{
    
    public function __construct(){
        
        $this->middleware('auth');
    }

    public function login(){

    }


    public function logout(){
        \Auth::logout();

        return \Redirect::route('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $createPost = new Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($createPost);
        // equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
        // equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));

        $user = User::where('email', '=', 'john.doe@gmail.com')->first();

        // role attach alias
        //$user->attachRole($admin); // parameter can be an Role object, array, or id

        // or eloquent's original technique
        $user->roles()->attach($admin->id); // id only

       
         
       
    }

    public function usuario(){
        $user = User::where('email', '=', 'john.doe@gmail.com')->first();
        $user->hasRole('owner');   // false
        echo $user->hasRole('admin');   // true
        echo '<br>';
        echo $user->can('edit-user');   // false
        echo '<br>';
        echo $user->can('create-post'); // true
        echo '<br>';
        echo $user->hasRole(['owner', 'admin']);       // true
        echo '<br>';
        echo $user->can(['edit-user', 'create-post']); // true
        echo '<br>';
        echo $user->hasRole(['owner', 'admin']); 
        echo '<br>';            // true
        echo $user->hasRole(['owner', 'admin'], true);  
        echo '<br>';     // false, user does not have admin role
        echo $user->can(['edit-user', 'create-post']);       // true
        echo '<br>';
        echo $user->can(['edit-user', 'create-post'], true); // false, user does not have edit-user permission
        echo '<br>';
        echo "asa".\Entrust::hasRole('admin');
        echo '<br>';
        echo \Entrust::can('create-post');
        echo '<br>';
        echo "asa".\Auth::user()->hasRole('owner');
        echo '<br>';
        echo \Auth::user()->can('create-post');

        $options = array(
            'validate_all' => true,
            'return_type' => 'both'
        );

        list($validate, $allValidations) = $user->ability(
            array('admin', 'owner'),
            array('create-post', 'edit-user'),
            $options
        );

        var_dump($validate);
        var_dump($allValidations);

        var_dump(\Auth::user()->ability('admin,owner', 'create-post,edit-user'),$options);

        return view('usuario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
