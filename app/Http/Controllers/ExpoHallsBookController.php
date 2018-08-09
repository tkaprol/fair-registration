<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use File;
use Auth;
use Validator;
use Mail;
use App\User;


class ExpoHallsBookController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($hall)
	{

		// get Expo Details
		$results = DB::table('halls')->where('id', '=', $hall)->get();

		foreach ($results as $result){

			$hallDetails = [
				'expo' => $result->expo,
				'name' => $result->name
			];

			// get Expo Details
			$expoResults = DB::table('expos')->where('id', '=', $hallDetails['expo'])->get();

			foreach ($expoResults as $expoResult){

				$expo = [
					'name' => $expoResult->name,
				];

			}

		}


		return view('reservation',['id' => $hall,'hallName'=>$hallDetails['name'],'expoName'=>$expo['name']]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$id = Input::get('id');

		$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'mail' => 'required|email',
        'documents' => 'required|mimes:pdf|max:4096',
        'logo' => 'required|image|max:256'
    ]);

		// dd($validator);

    if ($validator->fails()) {
        return redirect('halls/book/'.$id)
                    ->withErrors($validator)
                    ;
    }

		$name = Input::get('name');
		$mail = Input::get('mail');
		$documents = Input::get('documents');
		$logo = Input::get('logo');
		// check hall status
		$results = DB::table('halls')->where('id', '=', $id)->get();

		foreach ($results as $result){
			if ($result->booked == 1) {
				// Already Exists
				return redirect('halls/book/'.$id)->withErrors('This Hall has been already booked')->withInput();
			} else {

				$user = Auth::user();

				$imageName = Auth::user()->id.'.'.time().'.'.$request->file('logo')->getClientOriginalExtension();
				$documentName = Auth::user()->id.'.'.time().'.'.$request->file('documents')->getClientOriginalExtension();
				$request->file('logo')->move(public_path().'/logo',$imageName);
				$request->file('documents')->move(public_path().'/document',$documentName);
				$data = ['booked'=>1,'user'=>Auth::user()->id,'logo'=>'/logo/'.$imageName,'documents'=>'/document/'.$documentName,'contact'=>$name,'email'=>$mail];
				DB::table('halls')->where('id', '=', $id)->update($data);

				// Mail to user
				Mail::send('emails.confirmation', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Booking Application');

            $m->to($user->email, $user->name)->subject('Your Hall has been booked');
        });

				return redirect('home')->with('message', 'Congrats! Your Hall has been booked');
			}
		}

		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Configure the validator instance.
	 *
	 * @param  \Illuminate\Validation\Validator  $validator
	 * @return void
	 */
	public function withValidator($validator)
	{
	    $validator->after(function ($validator) {
	        if ($this->somethingElseIsInvalid()) {
	            $validator->errors()->add('name', 'Something is wrong with this field!');
	        }
	    });
	}

	public function messages()
	{
	    return [
	        'title.required' => 'A title is required',
	        'body.required'  => 'A message is required',
	    ];
	}

}
