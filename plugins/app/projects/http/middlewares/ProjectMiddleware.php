<?php
 
namespace App\Projects\Http\Middlewares;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Projects\Models\Project;
 
class ProjectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $userId = $user->id;

        $project = Project::where('id', $request->route('id'))->firstOrFail();
            
        if ($userId !== $project->project_manager_id) {
            return response("You are not a project manager", 403);
        }

            return $next($request);
    }
}