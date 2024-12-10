<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->isMethod('post')){
            $validatedData = $request->only('username', 'password');

            $username = "admin";
            $password = "admin";
            // $usernameFromInput = $request->input('getUsername');
            // $passwordFromInput = $request->input('getPassword');

            if($validatedData['username'] === $username && $validatedData['password'] === $password){
                // return redirect()->route('dashboardd');
                //return redirect()->route('dashboardd')->with('status', 'LOGIN SUCCESSFULLY!');
                // return response()->json([
                //     'name' => 'Abigail',
                //     'state' => 'CA',
                // ]);
               return redirect()->away('https://www.google.com');
                

            } else {
                return redirect()->back()->withErrors([$username => 'username or password is incorrect!']);
            }
        }
        

        return $next($request);
    }
}
