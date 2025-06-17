<?php

namespace App\Http\Middleware;

use App\Models\Group;
use App\Models\Member;
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

            $groupIds = Member::where('user_id', $user->id)->pluck('group_id');

            $groupsList = Group::whereIn('id', $groupIds)
                ->where('user_id', '!=', $user->id) // Exclure les groupes où il est coach
                ->get();
                // Partage la variable $foo à toutes les vues
                View::share('groupsList', $groupsList);
                return $next($request);
             }
         else{
         return back();

         }


    }
}
