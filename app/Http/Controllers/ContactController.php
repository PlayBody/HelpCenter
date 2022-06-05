<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\Mailer;
use Exception;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    
    public function mailshow()
    {
        return view('contacts.email');
    }
    public function mailsend(Request $request)
    {

        $validatedData = $request->validate([
            'from_email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'full_name' => 'required',
            'comment' => 'required',
        ], [
            'from_email.required' => 'Please enter a valid email address.',
            'full_name.required' => 'Please enter a valid name.',
            'comment.required' => 'Please enter your message.',
        ]);

        $sender_details = [
            'title' => 'Help-Centre We\'ve received your email',
            'body' => 'Hi
                Thanks for getting in touch. We\'ve received your email.
                If your query is urgent, please <a href="hehelpcentre-nohohome.co.uk">visit our Help Centre</a> where you can chat with an agent or view our Frequently Asked Questions.
                Our Live Chat service is available:
                Monday-Friday: 8am - 8:30pm
                Saturday - Sunday: 9am - 5:30pm
                Thanks
            ',
	    'files' => []
        ];

        \Mail::to($request->input('from_email'))->send(new Mailer($sender_details));

	$attachments = $request->input('attachments');
	$files = [];
	foreach ($attachments as $attachment){
		$files[] = storage_path('app/uploads/'.$attachment);
	}

        $details = [
            'title' => 'I got a message from ' . $request->input('full_name'),
            'body' => '<b>Mail Address : </b>'.$request->input('from_email').'
                    <b>Full Name : </b>'.$request->input('full_name').'
                    <b>Comment : </b>'.$request->input('comment').'
            ',
	    'files' => $files
	];

        \Mail::to('playbody2021@gmail.com')->send(new Mailer($details));
               

        return redirect('/');
    }

    public function phoneshow()
    {
        return view('contacts.phone');
    }

    public function phonesend(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
        ], [
            'email.required' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter a valid phone number.',
        ]);

        $phone = $request->input('phonenumber');
        
        try {
  
            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
  
            $receiverNumber = "+15673933371";
            $message = "This is testing from ItSolutionStuff.com";
  
            $message = $client->message()->send([
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);
  
            return redirect('/');              
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function upload(Request $request){
        if($request->hasFile('attachment')){
            $file = $request->file('attachment');
            
            $fileName = $file->getClientOriginalName();  
     
            $file->storeAs('uploads', $fileName);
            echo(json_encode(['result'=>true, 'file_name'=>$fileName]));
        }else{
            echo(json_encode(['result'=>false]));
        }
    }
}