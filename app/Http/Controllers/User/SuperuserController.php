<?php

namespace App\Http\Controllers\User;

use App\User;
use App\{ Permission, Role };
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Events\UserHasRegistered;
use App\Exports\UnactiveUsersExport;
use Maatwebsite\Excel\Facades\Excel;

class SuperuserController extends Controller
{
    public function index()
    {
        return view('users.superuser.index');
    }

    /**
     * Display a listing of users
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        $users = User::with('roles')->latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }


    /*
    |==================================
    |
    |   Unactive Users System
    |
    |==================================
    */

    public function unactiveUsers()
    {
        $users = User::with('roles')->where('activated', false)->latest()->get();

        return view('users.unactive', [
            'users' => $users
        ]);
    }

    public function exportUnactiveUsers(Request $request)
    {
        return Excel::download(new UnactiveUsersExport, 'unactive_user.xlsx');
    }

    public function sendReminderToUnactiveUsers(Request $request)
    {
        return redirect()->route('under.construction');
    }


    /*
    |==================================
    |
    |   Blocked Users System
    |
    |==================================
    */
    public function blockedUsers()
    {
        $users = User::with('roles')->where('blocked', true)->latest()->get();

        return view('users.blocked', [
            'users' => $users
        ]);
    }

    public function unblockAllUsers(Request $request)
    {
        $users = User::where('blocked', true)->get();

        foreach ($users as $user) {
            $user->update(['blocked' => false ]);
        }

        session()->flash('success', 'Users unblocked!');
        return redirect()->back();
    }

    public function unblockUser(Request $resquest, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $user->update(['blocked' => 0]);

        session()->flash('success', 'User unblocked!');

        return redirect()->back();
    }

    public function blockUser(Request $resquest, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $user->update(['blocked' => 1]);

        session()->flash('success', 'User blocked!');

        return redirect()->back();
    }




    /*
    |==================================
    |
    |   User CRUD
    |
    |==================================
    */
    /**
     * Show the for for creating new users
     * @return newly created user
     */
    public function createUser()
    {
        $roles = Role::all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    public function importMultipleUsers()
    {
        return view('users.import-multipleUsers');
    }

    public function createMultipleUsers(Request $request)
    {
       $file = $request->file('file');
       $csvData = file_get_contents($file);
    //    dd($csvData);
       $rows = array_map('str_getcsv', explode("\n", $csvData));
       $header = array_shift($rows);

       foreach ($rows as $row){
            $row = array_combine($header, $row);
            $password = rand();
            $user = User::create([
                'name'      => $row['name'],
                'email'     => $row['email'],
                'position' => $row['position'],
                'password'  => bcrypt($password)
            ]);
            $role = Role::where('name', 'columnist')->firstOrFail();
            if($user) $user->attachRole($role);

            event( new UserHasRegistered($user, $password));
       }

       session()->flash('success', 'Users Created!, and mails has been sent.' );

       return redirect()->route('users.index');
    }

    /**
     * Store a newly created resource in DB
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(StoreUser $request)
    {
        $password = rand();

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($password)
        ];

        $role = Role::where('name', $request->role)->firstOrFail();

        $user = User::create($data);

        if($user) $user->attachRole($role);

        event( new UserHasRegistered($user, $password));

        session()->flash('success', 'User Created!, and a mail has been sent to '.$user->name );

        return redirect()->route('users.index');
    }

    /**
     * Display the specified user
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function showUser($uuid)
    {
        $user = User::whereUuid($uuid)->with([
                    'roles',
                    'permissions'
                ])->firstOrFail();

        return view('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();
        $user->delete();
        return redirect()->route('users.index');
    }



    /*
    |==================================
    |
    |   Users Permissions System
    |
    |==================================
    */
    public function editPermissionUser($uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $userPermissions = $user->allPermissions();

        $allPermissions = Permission::all();

        return view('users.permission', [
            'user' => $user,
            'userPermissions' => $userPermissions,
            'allPermissions' => $allPermissions
        ]);
    }


    public function updatePermissionUser(Request $request, $uuid)
    {

        $user = User::whereUuid($uuid)->firstOrFail();

        $permission = Permission::where('name', $request->permissions)->first();

        $user->attachPermission($permission->id);

        return redirect()->route('users.show', $user->uuid);

    }


    /*
    |==================================
    |
    |   Users Roles System
    |
    |==================================
    */

    public function editRoleUser($uuid)
    {
        $user = User::whereUuid($uuid)->with('roles')->firstOrFail();

        $allRole = Role::all();

        return view('users.role', [
            'user' => $user,
            'allRole' => $allRole
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoleUser(Request $request, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $role = Role::where('name', $request->role)->firstOrFail();

        $user->syncRoles([$role->id]);

        return redirect()->route('users.show', $user->uuid);
    }

    /*
    |==================================
    |
    |   Users Position System
    |
    |==================================
    */

    public function updatePosition($uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        return view('users.position', [
            'user' => $user,
        ]);

    }

    public function storePosition(Request $request, $uuid)
    {
      $user = User::whereUuid($uuid)->firstOrFail();

      $user->position = $request->position;
      $user->save();
      //$user->update(['position' => $request->position]);

      //return $user;

      return redirect()->route('users.show', $user->uuid);
    }

    public function unShowUser(Request $resquest, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $user["show"] = 0;

        $user->update();

        session()->flash('success', 'User can not be seen to team webpage.');

        return redirect()->back();
    }

    public function showUserToTeam(Request $resquest, $uuid)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        $user["show"] = 1;

        $user->update();

        session()->flash('success', 'User can be seen to team webpage');

        return redirect()->back();
    }

}
