<?php

namespace Modules\Complaint\Http\Controllers\Admin;

use App\Http\Services\Image\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Routing\Controller;
use Modules\Complaint\Entities\Complaint;
use Illuminate\Support\Str;
use Modules\Complaint\Rules\ComplaintFilesRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class MyComplaintController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:complaint_handler');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $user = auth()->user();
        $complaintsCount = [
            'all' => $user->complaints()->count(),
            'unanswereds' => $user->complaints()->whereNull('answer')->count(),
            'answereds' => $user->complaints()->whereNotNull('answer')->count(),
            'invalids' => $user->complaints()->whereHas('userFails', function($userFail) use($user) {
                return $userFail->where('user_id', $user->id);
            })->count(),
        ];
        return view('complaint::admin.my-complaint.index', ['complaintsCount' => $complaintsCount]);
    }

    public function fetch()
    {
        $complaints = auth()->user()->complaints();

        switch (request('filter')) {
            case 'unanswered-complaints':
                $complaints->whereNull('answer');
                break;
            case 'answered-complaints':
                $complaints->whereNotNull('answer');
                break;
            case 'invalid-complaints':
                $complaints->whereHas('userFails', function($userFail) {
                    return $userFail->where('user_id', auth()->user()->id);
                });
                break;
        }

        if ($search = request('search')) {
            $complaints->where("subject", 'LIKE', "%{$search}%");
        }

        $complaints = $complaints->latest()->paginate(10);

        return response()->json($complaints);
    }

    public function show(Complaint $complaint)
    {
        return view('complaint::admin.my-complaint.show', compact('complaint'));
    }

    public function answer(Request $request, Complaint $complaint) 
    {
        $validData = $request->validate([
            'answer' => 'required|min:5',
            'files'         => [new ComplaintFilesRule],
        ]);

        DB::transaction(function () use($complaint, $validData, $request) {
            $complaint->forceFill([
                'answer' => $validData['answer'],
                'is_invalid' => 0,
                'is_answered' => 1,
                'answered_at' => now()
            ]);
    
            if ($request->filled('files')) {
                $complaint->files()->create([
                    'files' => explode(',', $validData['files']),
                    'user_id' => auth()->user()->id
                ]);
            }

            if (!complaintConfig('confirm_referrer')) {
                $this->confirm($complaint);
            }

            $userName = auth()->user()->full_name;

            Log::info("{$userName} پاسخی برای شکایت {$complaint->subject} ثبت کرد.");
        });
        
        $complaint->save();

        return back()->with('toast-success', 'پاسخ شما با موفقیت ثبت گردید.');
    }

}