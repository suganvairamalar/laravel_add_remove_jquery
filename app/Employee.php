<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use Kyslik\ColumnSortable\Sortable;
class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //use Sortable;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['employee_name','gender','dob','employee_age','employee_department_id','employee_position_id','known_technology_id','join_date','salary','id_proof','prev_office'];
    
    //public $sortable = ['id','name','position','office','age','start_date','salary'];

    protected $dates = ['dob', 'join_date'];

    public function getJoinDateAttribute($value){         
        return Carbon::parse($value)->format('d-m-Y');
    }
    

    public function getDobAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getKnownTechnologyIdAttribute($known_technology_id){
        return explode(',',$known_technology_id);
    }

    public function getIdProofAttribute($id_proof){
        return explode(',',$id_proof);
    }

    //BELOW FUNCTION USED TO SEND VIEW TO DATABASE in 
    public function setJoinDateAttribute($joinDate) {
        $this->attributes['join_date'] = Carbon::parse($joinDate)->toDateString(); //'toDateTimeString(); use to dd:mm:yyyy:hh:mm:ss
    }
 
    
    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::parse($dob)->toDateString();
    }

    public function setKnownTechnologyIdAttribute($known_technology_id) {
        $this->attributes['known_technology_id'] = implode(",", $known_technology_id);
    }


    public function setIdProofAttribute($id_proof) {
        $this->attributes['id_proof'] = implode(",", $id_proof);
    }
}
