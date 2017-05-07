<?php

namespace App\Http\Middleware;

use App\Group;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $request->user();
        if (empty($user->id)) {
            return redirect('/home');
        }
        $userGroup = Group::find($user->group_id);
        $groupAdmin = Group::find(Group::ADMIN);
        if ($userGroup->privilege < $groupAdmin->privilege) {
            return redirect('/visitor');
        }
        return $next($request);
    }
}
