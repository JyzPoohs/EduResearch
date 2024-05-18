<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function index(){
        $q=Feedback::get();
        return view('ManageFeedback.Student.listOfFeedback',['data'=>$q]);
    }
    public function viewFeedback($id){
        $q=Feedback::where('id',$id)
        ->first();
        return view('ManageFeedback.Student.viewFeedback',['data'=>$q]);
    }
    public function updateFeedbacks($id){
        $data=Feedback::where('id',$id)
        ->first();
        
        // return view('ManageFeedback\Student\updateFeedback',['data'=>$q]);
        return view('ManageFeedback.Student.updateFeedback', compact('data'));
    }

    public function newApplication(){
        return view('ManageFeedback.Student.newApplication');
    }
    public function addFeedback(Request $request){
        Feedback::create([
            'name'=>$request->nama,
            'noKp'=>$request->noKp,
            'explain'=>$request->feedback,
            'status'=>'Pending'
        ]);
        return $this->index();
    }
    public function updateFeedback(Request $request) {

        Feedback::where('id',$request->id)
        ->update([
            'explain'=>$request->feedback,
            'answer'=>$request->answer ?? null,
        ]);
        return redirect()->back();
    }
    public function deleteFeedback(Request $request,$id){
        
        Feedback::where('id',$id)->delete();
        return $this->index();
    }

    public function LecturerFeedback(){
        $q=Feedback::get();
        return view('ManageFeedback.Lecturer.listOfFeedback',['data'=>$q]);
    }
    public function LecturerViewFeedback($id){
        $q=Feedback::where('id',$id)
        ->first();
        return view('ManageFeedback.Lecturer.lectViewFeedback',['data'=>$q]);
    }
    public function LecturerEditFeedback($id){
        $q=Feedback::where('id',$id)
        ->first();
        return view('ManageFeedback.Lecturer.lectEditFeedback',['data'=>$q]);
    }
    public function statusFeedback($id, $status){
       // dd($status);
        Feedback::where('id',$id)
        ->update([
            'status'=>$status
        ]);

            $r=Feedback::where('id',$id)
            ->first();
            return view('ManageFeedback.Lecturer.lectEditFeedback',['data'=>$r]);

    }

    public function updateStatus(Request $request, $id){
        $q = Feedback::findOrFail($id); // Find the feedback by ID or fail
        $q->status = $request->input('status'); // Set the new status from the form
        $q->answer = $request->input('answer'); // Set the reason from the form
        $q->save(); // Save the changes to the database
    
        return redirect('.Lecturer.feedback')->with('success', 'Feedback status updated successfully!');
    }
}