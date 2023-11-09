<?php
 
namespace App\Tasks\Http\Middlewares;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Tasks\Models\Task;
 
class TaskMiddleware
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
        
        $task = Task::where('id', $request->route('id'))->firstOrFail();
            
        if ($userId !== $task->asignee_id) {
            return response("This task is not yours", 403);
        }

            return $next($request);
    }
}