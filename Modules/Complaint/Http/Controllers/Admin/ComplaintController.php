<?php

namespace Modules\Complaint\Http\Controllers\Admin;

use App\Models\ACL\Permission;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Complaint\Entities\Complaint;
use Modules\Complaint\Entities\Departement;
use Illuminate\Support\Facades\Notification;
use Modules\Complaint\Notifications\NewComplaint;
use Illuminate\Support\Facades\Log;


class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function __construct()
    {
        $this->middleware('can:manage_complaint');
    }

    public function index()
    {
        $complaintsCount = [
            'all' => Complaint::count(),
            'notReferenced' => Complaint::whereNull('reference_id')->count(),
            'referenced' => Complaint::whereNotNull('reference_id')->count(),
            'waitingAnswer' => Complaint::whereNotNull("reference_id")->where('is_invalid', 0)->whereNull('answer')->count(),
            'invalids' => Complaint::where('is_invalid', 1)->count(),
            'answered' => Complaint::where('is_answered', 1)->count(),
        ];

        return view('complaint::admin.complaint.index', ['complaintsCount' => $complaintsCount]);
    }

    public function fetch()
    {
        $complaints = Complaint::query()->select('id', 'first_name', 'last_name', 'subject', 'reference_id', 'is_invalid', 'is_answered');

        switch ($filter = request('filter')) {
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
                $complaints->where('is_answered', 1);
                break;
        }

        if ($search = request('search')) {
            $complaints->where("subject", 'LIKE', "%{$search}%")->orWhere('first_name', "LIKE", "%{$search}%")->orWhere("last_name", "LIKE", "%{$search}%");
        }

        $complaints = $complaints->latest()->paginate(10);

        return response()->json($complaints);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        return view('complaint::create');
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

        return view('complaint::admin.complaint.show', compact('complaint', 'departements', 'userFails'));
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

        $this->newReferrallNotifiction($complaint);

        $userName = auth()->user()->full_name;
        $refferalUserName = $complaint->user->full_name;

        Log::info("{$userName} شکایت {$complaint->subject} را به {$refferalUserName} ارجاع داد.");

        return back()->with('toast-success', "شکایت با موفقیت به متصدی مدنظر ارجاع داده شد.");
    }

    public function newReferrallNotifiction($complaint)
    {
        $subject = $complaint->subject;

        $userPermission = Permission::where("key", "complaint_handler")->first()->users()->whereNotNull('mobile')->get();

        $userIds = $userPermission->pluck('id')->toArray();

        $details = [
            'message' => " شکایت با عنوان : {$subject} ارجاع داده شد " ,
        ];

        $notification = new NewComplaint($details);

        Notification::send(User::whereIn('id', $userIds)->get(), $notification);

    }

    public function readAll()
    {
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification){
            $notification->update(['read_at' => now()]);
        }
    }

}
