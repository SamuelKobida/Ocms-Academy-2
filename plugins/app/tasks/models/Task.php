<?php namespace App\Tasks\Models;

use Model;
use App\TimeEntries\Models\TimeEntry;
use Carbon\Carbon;

/**
 * Task Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'app_tasks_tasks';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */

     public $belongsTo = [
        'project' => ['App\Projects\Models\Project'],
        'asignee' => ['RainLab\User\Models\User']
    ];


    public function getTotalTaskTimeInSeconds()
    {
        return $totalSeconds = $this->timeEntries()
            ->get()
            ->sum(function ($timeEntry) {
                $start = Carbon::parse($timeEntry->start_time);
                $end = Carbon::parse($timeEntry->end_time);
                return $end->diffInSeconds($start);
            });
    }

    public function getTotalTaskTime()
    {
        $totalSeconds = $this->getTotalTaskTimeInSeconds();
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;
        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    }
    
}
