<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Wedding;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::where('wedding_id', Auth::user()->client->wedding->id)->where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $meetings = $meetings->map(function ($meeting) {
            $meeting_date = new Carbon($meeting->meeting_date);
            $meeting->meeting_date = $meeting_date->day . " " . $meeting_date->locale('ID')->getTranslatedMonthName() . " " . $meeting_date->year;
            $meeting->meeting_day = $meeting_date->locale('ID')->getTranslatedDayName();
            return $meeting;
        });

        return view('dashboard.client.page.meeting.index', [
            "active" => "meeting",
            "meetings" => $meetings
        ]);
    }

    public function create(Wedding $wedding)
    {
        return view('dashboard.admin.page.meeting.create', [
            'wedding' => $wedding,
            'active' => 'wedding'
        ]);
    }

    public function store(Request $request, Wedding $wedding)
    {
        $validatedData = $request->validate([
            'topic' => 'required',
            'meeting_date' => 'required',
            'meeting_time' => 'required',
            'body' => 'required',
            'photo' => 'required',
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('meeting-photo');

        Meeting::create([
            'wedding_id' => $wedding->id,
            'topic' => $validatedData['topic'],
            'meeting_date' => $validatedData['meeting_date'],
            'meeting_time' => $validatedData['meeting_time'],
            'body' => $validatedData['body'],
            'photo' => $validatedData['photo']
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id)->with('section', 'meeting');
    }

    public function show(Meeting $meeting)
    {
        //
    }

    public function edit(Meeting $meeting)
    {
        return view('dashboard.admin.page.meeting.edit', [
            'meeting' => $meeting,
            'active' => 'wedding'
        ]);
    }

    public function update(Request $request, Meeting $meeting)
    {
        $validatedData = $request->validate([
            'topic' => 'required',
            'meeting_date' => 'required',
            'meeting_time' => 'required',
            'body' => 'required',
        ]);

        if ($request->file('photo'))
            $validatedData['photo'] = $request->file('photo')->store('meeting-photo');
        else
            $validatedData['photo'] = $meeting->photo;

        Meeting::where('id', $meeting->id)->update([
            'topic' => $validatedData['topic'],
            'meeting_date' => $validatedData['meeting_date'],
            'meeting_time' => $validatedData['meeting_time'],
            'body' => $validatedData['body'],
            'photo' => $validatedData['photo']
        ]);

        return redirect('/dashboard/wedding/' . $meeting->wedding_id)->with('section', 'meeting');
    }

    public function destroy(Meeting $meeting)
    {
        Meeting::where('id', $meeting->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding/' . $meeting->wedding_id)->with('section', 'meeting');
    }
}
