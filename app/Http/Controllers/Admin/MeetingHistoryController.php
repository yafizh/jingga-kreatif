<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MeetingHistory;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MeetingHistoryController extends Controller
{
    public function __construct()
    {
        Session::flash('section', 'meeting_history');
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

        MeetingHistory::create([
            'wedding_id' => $wedding->id,
            'topic' => $validatedData['topic'],
            'meeting_date' => $validatedData['meeting_date'],
            'meeting_time' => $validatedData['meeting_time'],
            'body' => $validatedData['body'],
            'photo' => $validatedData['photo']
        ]);

        return redirect('/dashboard/wedding/' . $wedding->id);
    }

    public function edit(MeetingHistory $meetingHistory)
    {
        return view('dashboard.admin.page.meeting.edit', [
            'meeting' => $meetingHistory,
            'active' => 'wedding'
        ]);
    }

    public function update(Request $request, MeetingHistory $meetingHistory)
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
            $validatedData['photo'] = $meetingHistory->photo;

            MeetingHistory::where('id', $meetingHistory->id)->update([
            'topic' => $validatedData['topic'],
            'meeting_date' => $validatedData['meeting_date'],
            'meeting_time' => $validatedData['meeting_time'],
            'body' => $validatedData['body'],
            'photo' => $validatedData['photo']
        ]);

        return redirect('/dashboard/wedding/' . $meetingHistory->wedding_id);
    }

    public function destroy(MeetingHistory $meetingHistory)
    {
        MeetingHistory::where('id', $meetingHistory->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/wedding/' . $meetingHistory->wedding_id);
    }
}
