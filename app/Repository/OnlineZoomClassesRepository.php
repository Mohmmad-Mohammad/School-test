<?php


namespace App\Repository;

use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlineClasse;
use App\Repository\Interfaces\OnlineZoomClassesRepositoryInterface;
use MacsiDigital\Zoom\Contracts\Zoom;

class OnlineZoomClassesRepository implements OnlineZoomClassesRepositoryInterface
{
    use MeetingZoomTrait;
    public function index()
    {
        $online_classes = OnlineClasse::where('created_by',auth()->user()->email)->get();
        return view('pages.Teachers.dashboard.online_classes.index', compact('online_classes'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.add', compact('Grades'));
    }

    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.indirect', compact('Grades'));
    }


    public function store($request)
    {
        try {
            $meeting = $this->createMeeting($request);
            OnlineClasse::create([
                'integration' => true,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('OnlineZoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeIndirect($request)
    {
        try {
            OnlineClasse::create([
                'integration' => false,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('OnlineZoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy($request,$id)
    {
        try {

            $info = OnlineClasse::find($id);
            if($info->integration == true){
                // $meeting = Zoom::meeting()->find($request->meeting_id);
                // $meeting->delete();
                OnlineClasse::destroy($id);
            }else{
                OnlineClasse::destroy($id);
            }
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('OnlineZoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

}