<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Journal;
use App\Models\JournalMedia;


class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Journal::orderBy('created_at','desc')->get();
        return view('admin.journal.index',compact('listings'))->with('controllername','Journal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.journal.create')->with('controllername','Journal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo auth()->user()->id; die;
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        // Create Journal
        $journal = new Journal;
        $journal->title = $request->input('title');
        $journal->description = $request->input('description');
        $journal->created_by = Auth::id();
        $journal->save();

        $file = $request->file('image');

        if($request->file('image'))
        {
            $destinationPath = public_path('/uploads/journals/');

            $name = 'journal_'.$file->getSize().time().'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$name);

            $filename = $destinationPath.'/'.$name;
            $source = imagecreatefromjpeg($filename);
            list($width, $height) = getimagesize($filename);

            $newwidth = $width/10;
            $newheight = $height/10;

            $destination = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            imagejpeg($destination, $destinationPath.'thumb/'.$name, 100);

            $journalMedia = new JournalMedia;
            $journalMedia->journal_id = $journal->id;
            $journalMedia->image = 'public/uploads/journals/'.$name;
            $journalMedia->save();
        }
        
        return redirect('admin/journal/create')->with('success', 'Journal added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function images($id)
    {
        $journal = JournalMedia::where('journal_id','=', $id)
                ->get();

        return view('admin.journal.images')->with('journal', $journal)->with('controllername','Journal');
    }


}
