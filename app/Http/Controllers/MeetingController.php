<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{


    private $request;
    private $meeting;

    public function __construct(Request $request, Meeting $meeting)
    {
        $this->request = $request;
        $this->meeting = $meeting;
    }

    public function index()
    {
        $all = $this->get_all($this->meeting);
        return view('{{blade path}}', compact('all'));
    }

    public function create()
    {
        return view('{{blade path}}');
    }

    public function store()
    {
        $this->validate($this->request, [
            'subject' => 'required',
            'datetime' => 'required',
            'attende1_email' => 'required|email',
            'attende1_email' => 'required|email',
        ]);

        $data = $this->request->except('_token');
        $data['creator_id'] = auth()->user()->id;

        $meeting = $this->add($this->meeting, $data);

        //Google Calendar

        return redirect()->route('meetings.index');
    }

    public function edit($id)
    {
        $meeting = $this->get_by_id($this->meeting, $id);
        return view('meetings.edit', compact('meeting'));
    }

    public function update($id)
    {
        $this->validate($this->request, [
            'subject' => 'required',
            'datetime' => 'required',
            'attende1_email' => 'required|email',
            'attende2_email' => 'required|email',
        ]);

        $data = $this->request->except('_token', '_method');
        $this->get_by_id($this->meeting, $id)->update($data);

        //Google Calendar

        return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully!');
    }

    public function destroy($id)
    {
        $this->delete($this->meeting, $id);

        // delete Google Calendar here

        return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully!');
    }
}
