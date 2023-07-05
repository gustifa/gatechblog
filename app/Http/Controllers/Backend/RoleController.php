<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permission'));
    }

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => ' Permission Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request){
        $per_id = $request->id; 
        $permission = Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Permission Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){
        Permission::findOrfail($id)->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function AllDelete(){
        
        $delete = DB::table('permissions')->delete();
        //dd($delete);
        if($delete){
            $notification = array(
                'message' => 'Table Permission Delete All Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notification);

        }else{
            $notification = array(
                'message' => 'Table Permission Error All Successfully',
                'alert-type' => 'error'
            );
            return redirect()->route('all.permission')->with($notification);
        }


        
    }

    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }


    public function StoreRoles(Request $request){
        $role = Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => ' Roles Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id){
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    }

    public function UpdateRoles(Request $request){
        $per_id = $request->id; 
        $roles = Role::findOrFail($per_id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Roles Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id){
        Role::findOrfail($id)->delete();

        $notification = array(
            'message' => 'Roles Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function AddRolePermission(){
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getpermissionGroup();
        return view('backend.rolesetup.add_roles_permission', compact('roles', 'permission', 'permission_groups'));
    }

    public function RolePermissionStore(Request $request){
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Roles Permission Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolePermission(){
        $roles = Role::all();
        return view('backend.rolesetup.all_roles_permission', compact('roles'));
    }

    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }

    public function Export(){
        $user = Auth::user()->name;
        return Excel::download(new PermissionExport, 'Template '.$user.'-user.xlsx');
    }

    public function StoreImportPermission(Request $request){
        $importFIle =$request->file('import_file');
        $import = Excel::import(new PermissionImport, $importFIle);
        if( $import){
            $notification = array(
                'message' => 'Permission Import Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notification);
        }else{
            $notification = array(
                'message' => 'Roles Permission Add Error',
                'alert-type' => 'error'
            );
            return redirect()->route('all.permission')->with($notification);
        }
        
    }

    public function DownloadTemplatePermission(){
        // $path = public_path('/file/excel/import/import_template/template_excel_userrfid.xlsx');
        // $name = basename($path);
        // $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        // return response()->download($path, $name, $headers);
        $path = public_path('/upload/template/excel/template_permission.xlsx');
        // $name = basename($path);      
        // $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path);
    }

    public function ImportAdmin(){
        return view('backend.pages.admin.import_admin');
    }

    public function AdminImportStore(Request $request){
        $importFIle =$request->file('import_file');
        $import = Excel::import(new UserImport, $importFIle );
        if( $import){
            $notification = array(
                'message' => 'User Admin Import Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.admin')->with($notification);
        }else{
            $notification = array(
                'message' => 'Import User Error',
                'alert-type' => 'error'
            );
            return redirect()->route('all.admin')->with($notification);
        }
        
        
    }

    public function ExportAdmin(){
        $user = Auth::user()->name;
        $headings =
                [
                    'Nama',
                    'Username',
                    'Email',
                ];
        return Excel::download(new UserExport( $headings), 'Export user.xlsx');
    }

    public function DownloadTemplateAdmin(){
        // $path = public_path('/file/excel/import/import_template/template_excel_userrfid.xlsx');
        // $name = basename($path);
        // $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        // return response()->download($path, $name, $headers);
        $path = public_path('/upload/template/excel/template_admin.xlsx');
        // $name = basename($path);      
        // $headers = ["Content-Type:   application/vnd.ms-excel; charset=utf-8"];
        return response()->download($path);
    }

    


}
