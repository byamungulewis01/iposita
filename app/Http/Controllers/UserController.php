<?php

namespace App\Http\Controllers;

use App\Imports\ClientImport;
use App\Jobs\SendSms;
use App\Mail\MailResetPassword;
use App\Models\Branch;
use App\Models\User;
use App\Models\UserFlowHistory;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\MailRegisteredUser;
use App\DataTables\UserDataTable;
use App\Http\Requests\ValidateUser;
use App\Http\Requests\ValidateUpdateUser;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    const FILE_PATH = "public/files/users";

    public function index()
    {
        $data = User::with(["permissions", "branch"]);
        if (auth()->user()->branch_id) {
            $data = $data->where("branch_id", auth()->user()->branch_id);
        }
        $data = $data->orderBy('updated_at', 'desc')->select("users.*")->get();
        $dataTable = new UserDataTable($data);
        $branches = Branch::query()->where("status", "Active")->get();
        return $dataTable->render('admin.user_management.users', compact("branches"));
    }


    public function store(ValidateUser $request)
    {
        $request->validated();
        $ini_pass = random_int(1000000, 9999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->national_id = $request->national_id;
        if ($request->has('nid_attachment') && $request->nid_attachment)
        {
            $filename = $this->storeFile($request,'nid_attachment');
            $user->nid_attachment = $filename;
        }
        if ($request->has('photo') && $request->photo)
        {
            $filename = $this->storeFile($request,'photo');
            $user->photo = $filename;
        }

        if ($request->has('iposita_form') && $request->iposita_form)
        {
            $filename = $this->storeFile($request,'iposita_form');
            $user->iposita_form = $filename;
        }

//        $user->password = bcrypt('Password@123!');
        $user->password = bcrypt($ini_pass);
        $user->is_super_admin = false;
        $user->branch_id = $request->branch;
        $user->gender = $request->gender;
        $user->save();
        $this->dispatch(new MailRegisteredUser($user->email,$ini_pass,$user->name,$user->telephone));
        return redirect()->back()->with('success', 'User created successfully');
    }

    public function update(ValidateUpdateUser $request, $user_id)
    {
        $request->validated();
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->gender = $request->gender;
        $user->national_id = $request->national_id;
        if ($request->has('nid_attachment') && $request->nid_attachment)
        {
            $filename = $this->storeFile($request,'nid_attachment');
            $user->nid_attachment = $filename;
        }
        if ($request->has('photo') && $request->photo)
        {
            $filename = $this->storeFile($request,'photo');
            $user->photo = $filename;
        }
        if ($request->has('iposita_form') && $request->iposita_form)
        {
            $filename = $this->storeFile($request,'iposita_form');
            $user->iposita_form = $filename;
        }
        $user->is_active = $request->is_active;
        $user->branch_id = $request->branch;
        $user->save();
        return redirect()->back()->with('success', 'User Updated successfully');
    }

    public function userProfile($user_id)
    {
        $id = decryptId($user_id);
        $user = User::find($id);
        return view("admin.user_management.profile", compact("user"));
    }


    public function resetPassword($user_id)
    {
        $id = decryptId($user_id);
        $user = User::find($id);
        $password = $this->generatePassword();
        $user->password = bcrypt($password);
        $user->save();
        $this->notifyResetPassword($user, $password);
        return redirect()->back()->with('success', "{$user->email} reset successfully");
    }

    public function notifyResetPassword($user, $password)
    {
//        Mail::to($user->email)->send(new MailResetPassword($user, $password));
        $message = "Your Account password has been reset. use this \" $password \" as password to login to your account.";
        $this->sendSMS($user, $message);
    }

    public function getUsersByBranch(Request $request)
    {
        $branches = $request->branches;
        if ($branches) {
            return User::whereIn("branch_id", $branches)->get();
        }

        return [];
    }

    protected static function storeFile($request, $paramName)
    {
        $file = $request->file($paramName);
        $extension = $file->extension();
        $image_name=$file->getClientOriginalName();
        $uuid = "attachment_" . str_slug(Str::uuid(), '_');
        $path = $file->storeAs(self::FILE_PATH, "$uuid" . ".$extension");
        $path=str_replace(' ','_',$path);
        return str_replace(self::FILE_PATH, '', $path);
    }

    public function disableUser($user_id)
    {
        $id = decryptId($user_id);
        $user = User::find($id);
        $action = $user->is_active ? 'Deactivate' : 'Activate';
        $user->is_active = !$user->is_active;
        $user->save();
        $this->saveFlowHistory($user,\request('reason'), $action);
        return redirect()->back()->with('success', "{$user->email} {$action}d successfully");
    }

    public function saveFlowHistory($user, $reason, $action){
        $flow = new UserFlowHistory();
        $flow->user_id = $user->id;
        $flow->reason = $reason;
        $flow->action = $action;
        $flow->done_by = auth()->user()->id;
        $flow->done_at = Carbon::now();
        $flow->save();
    }

    public function showUserFlowHistory($user_id)
    {
        $id = decryptId($user_id);
        $user = User::find($id);
        $histories = UserFlowHistory::where('user_id', $id)->get();
        return view('admin.user_management.flow_history', compact('user', 'histories'));
    }

    protected function sendSMS(User $user, $message = null): void
    {
        if (is_null($message)) {
            return;
        }
        // if env is local then send sms
        if (config('app.env') != 'local') {
            SendSms::dispatch($user->telephone, $message);
        }
    }


}
