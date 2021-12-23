<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
use App\Video;
use App\Question;
class VideoController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        $videos = Video::latest()->paginate(4);
        return view('index',compact('videos'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        return view('video.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {

        $r=$request->validate([
        'name' => 'required',
        'email' => 'required'
        ]);

        $custId = $request->cust_id;
        Video::updateOrCreate(['id' => $custId],['title' => $request->name, 'link' => $request->email]);
        if(empty($request->cust_id))
            $msg = 'Video entry created successfully.';
        else
            $msg = 'Video data is updated successfully';
        return redirect()->route('videos.index')->with('success',$msg);
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $data['video'] = Video::find($id);
        $data['questions'] = $data['video']->questions;
        return view('show')->with($data);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    
    public function edit($id)
    {
        $where = array('id' => $id);
        $video = Video::where($where)->first();
        //return Response::json($video);
        return view('edit', compact('video'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request)
    {
        $sentences = preg_split('/\r\n|[\r\n]/', $request['questions']);
        $video_id = $request->id;
        $video = Video::find($video_id);
        DB::beginTransaction();
        try {
            foreach ($sentences as $key => $value) {
                $question = new Question();
                $question->video_id = $video_id;
                $question->word_tokens = $value;
                $question->save();
            }
            $video->title = $request->title;
            $video->save();
            DB::commit();
            $msg = "Video has edited successfully";
        } catch (Exception $e) {
            return back()->with('success',$e);
        }
        return redirect()->route('videos.index')->with('success',$msg);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function destroy($id)
    {
        $cust = Video::where('id',$id)->delete();
        return Response::json($cust);
    }
}