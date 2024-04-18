<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Event;
use App\Ticket;
use App\Country;
use App\Partner;
use App\Speaker;
use Carbon\Carbon;
use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account/my-registrations';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'institution' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::where('email', data['email'])->first();

        if($user){
            $user_id = $user->id;
        }else{
            $user = User::create([
                'title' => $data['title'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'institution' => $data['institution'],
                'designation' => $data['designation'],
                'country' => $data['country'],
                'code' => $data['code'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'role_id' => 3,
            ]);

            $user_id = $user->id;
        }

        
        if ($user) {
            $to = $data['email'];
            $to_name = $data['first_name'] . ' ' . $data['last_name'];
            $my_registrations_count = Registration::where('event_id', 7)->where('user_id', $user_id)->count();

        if ($my_registrations_count == 0) {
            if ($data['event_id'] != NULL && $data['ticket_id'] != NULL) {
                $event = Event::find($data['event_id']);
                $event_create = Registration::create([
                    'event_id' => $data['event_id'],
                    'ticket_id' => $data['ticket_id'],
                    'reference' => $data['reference'],
                    'type' => $data['type'],
                    'attendance_mode' => $data['attendance_mode'],
                    'payment_mode' => $data['payment_mode'],
                    'user_id' => $user->id,
                ]);

                if ($event_create) {
                    $subject = "Welcome!";
                    $email_data = (object) array(
                        'title' => 'Welcome <b>' . $to_name . '</b>',
                        'link' => "https://cybershield.daystar.ac.ke",
                        'body' => "Thank You for registering for <b> $event->title </b> happening on <b>" . date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time)) . "</b> at $event->venue"
                    );
                    sendMail($email_data, $to, $to_name, $subject);
                }else{
                    return redirect()->back()->with('error', 'Oops Something went wrong');
                }
            }
            return redirect()->back()->with('success', 'Your Details have been submitted Successfully! We will get back to you.');
            // $subject = "Daystar University Login Credential";
            // $password = $data['password'];
            // $email_data = (object) array(
            //     'title' => 'Hi <b>' . $to_name . '</b>',
            //     'link' => route('auth.login'),
            //     'body' => "Thank You for signing up with Daystar Conferences. Here is your login credentials <p> Email: <b>$to</b> <br> Password: <b>$password</b>"
            // );
            // sendMail($email_data, $to, $to_name, $subject);
        }else{
            return redirect()->back()->with('error', 'You have already registered for this event');
        }
    }
}

    public function showRegistrationForm()
    {
        // if (!session()->has('url.intended')) {
        //     session(['url.intended' => url()->previous()]);
        // }
        $upcoming_events = Event::where('end_time', '>=', Carbon::now()->toDateString())->orderBy('start_time', 'ASC')->paginate(12);
        $countries = Country::orderBy('name')->get();
        $event = Event::where('id', 7)->first();

        return view('auth.register', compact('event', 'countries'));
    }

    function registerjson(Request $request)
    {
        $now = Carbon::now()->toDateString();
        $match = [
            ['event_id', '=', $request->id],
            ['available_from', '<=', $now],
            ['available_to', '>=', $now]
        ];

        // used collect method to be able to sortBy
        $tickets = Ticket::where($match)->orderBy('price')->get();
        return response()->json($tickets);
    }

    // protected function registered(Request $request, $user)
    // {
    //     return redirect()->intended($this->redirectPath());
    // }

    // protected function redirectTo(){
    //     return url()->previous();
    // }

}
