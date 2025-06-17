<?php

namespace App\Http\Middleware;

use App\Models\Group;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class GroupsLis
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();
         if($user != null)
         {
             $groupsList = Group::where('user_id', $user->id)->get();
            // Partage la variable $foo à toutes les vues
            View::share('groupsList', $groupsList);
            return $next($request);
         }
         else{
         return back();

         }


    }
}
