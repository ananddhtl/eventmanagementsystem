<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\BookEvent;
use App\Models\Event;
use App\Models\Category;
use App\Models\NormalUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminUserController extends Controller
{
    public function index()
    {


        return view('admindashboard.login');
    }



    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('admindashboard.register');
    }

    public function adminregisteration(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            // Existing code to get book events and categorize them by month
            $bookevents = BookEvent::get();
            $eventsByMonth = $bookevents->groupBy(function ($event) {
                return Carbon::parse($event->created_at)->format('M');
            });

          
            $eventLabels = [];
            $eventDataValues = [];
            foreach ($eventsByMonth as $month => $events) {
                $eventLabels[] = $month;
                $eventDataValues[] = count($events);
            }

          
            $normalUsersCount = NormalUsers::where('status', 0)->count();
            $organizerCount = NormalUsers::where('status', 1)->count();
            $adminUsersCount = User::count();
            $totalEvent = Event::count();
            $venue = Category::count();
            $totalRevenue = BookEvent::sum('total_price');
            $musicCount = Event::where('category', 'Music')->count();
            $sportsCount = Event::where('category', 'Sports')->count();
            $othersCount = Event::whereNotIn('category', ['Music', 'Sports'])->count();

           
            return view(
                'admindashboard.index',
                compact(
                    'eventLabels',
                    'eventDataValues',
                    'normalUsersCount',
                    'organizerCount',
                    'adminUsersCount',
                    'totalEvent',
                    'venue',
                    'totalRevenue',
                    'musicCount',
                    'sportsCount',
                    'othersCount'
                )
            );
        }

       
        return redirect("login")->withSuccess('You are not allowed to access');
    }



    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
