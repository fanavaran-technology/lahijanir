<?php

namespace App\Http\Controllers\Admin\Complaint;

use App\Models\ACL\Permission;
use App\Models\User;
use App\Notifications\Complaint\ReferenceComplaint;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Complaint\Complaint;
use App\Models\Complaint\Departement;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function __construct()
    {
        $this->middleware('can:manage_complaint')->except('readAll');
    }

    public function index()
    {
        $complaintsCount = [
            'all' => Complaint::count(),
            'notReferenced' => Complaint::whereNull('reference_id')->count(),
            'referenced' => Complaint::whereNotNull('reference_id')->count(),
            'waitingAnswer' => Complaint::whereNotNull("reference_id")->where('is_invalid', 0)->whereNull('answer')->count(),
            'invalids' => Complaint::where('is_invalid', 1)->count(),
            'answered' => Complaint::where('is_answered', 1)->where('is_confirm', 1)->count(),
            'not-confirmed' => Complaint::whereNotNull('answer')->where('is_confirm', 0)->count(),
        ];

        return view('admin.complaint.complaint.index', ['complaintsCount' => $complaintsCount]);
    }

    public function fetch()
    {
        $complaints = Complaint::query()->select('id', 'first_name', 'last_name', 'subject', 'reference_id', 'is_invalid', 'is_answered');

        switch (request('filter')) {
            case 'not-referenced-complaints':
                $complaints->whereNull('reference_id');
                break;
            case 'referenced-complaints':
                $complaints->whereNotNull('reference_id');
                break;
            case 'waiting-answer':
                $complaints->whereNotNull("reference_id")->where('is_invalid', 0)->whereNull('answer');
                break;
            case 'invalid-complaints':
                $complaints->where('is_invalid', 1);
                break;
            case 'answered-complaints':
                $complaints->where('is_answered', 1)->where('is_confirm', 1);
                break;
            case 'not-confirmed': 
                $complaints->where('is_answered', 1)->where('is_confirm', 0);
                break;

        }



        if ($search = request('search')) {
            $complaints->where("subject", 'LIKE', "%{$search}%")->orWhere('first_name', "LIKE", "%{$search}%")->orWhere("last_name", "LIKE", "%{$search}%");
        }

        $complaints = $complaints->latest()->paginate(10);

        return response()->json($complaints);
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Complaint $complaint)
    {
        $departements = Departement::all();

        $userFails = $complaint->userFails()->get();

        return view('admin.complaint.complaint.show', compact('complaint', 'departements', 'userFails'));
    }


    public function referral(Request $request, Complaint $complaint)
    {
        $validData = $request->validate([
            'departement_id' => 'required|exists:departements,id',
            'reference_id' => 'required|exists:departement_user,user_id'
        ]);

        $complaint->forceFill([
            'reference_id' => $validData['reference_id'],
            'departement_id' => $validData['departement_id'],
            'referenced_at' => now(),
            'is_invalid' => 0,
        ]);

        $complaint->save();

        $userReferral = $complaint->reference_id;

        $this->newReferrallNotifiction($complaint , $userReferral);

        $userName = auth()->user()->full_name;


        $refferalUserName = $complaint->user->full_name;

        Log::info("{$userName} شکایت {$complaint->subject} را به {$refferalUserName} ارجاع داد.");

        return back()->with('toast-success', "شکایت با موفقیت به متصدی مدنظر ارجاع داده شد.");
    }
    
    public function newReferrallNotifiction($complaint , $userReferral)
    {
        $subject = $complaint->subject;

        $userPermission = User::findOrFail($userReferral);

        $details = [
            'message' => " شکایت با عنوان : {$subject} ارجاع داده شد " ,
            "sms_message" => "یک شکایت منتظر شماست. لطفاً به آن پاسخ دهید - شهرداری لاهیجان",
        ];

        $userPermission->notify(new ReferenceComplaint($details));
    }

    public function readAll()
    {
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification){
            $notification->update(['read_at' => now()]);
        }
    }
}
