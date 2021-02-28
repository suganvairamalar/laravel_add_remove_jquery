<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_name','gender','dob','student_age','student_image','join_date','father_name','contact_number','contact_email','address','mother_tongue','known_languages','certificates'];


     protected $dates = ['dob', 'join_date'];

    //below code is for to show date from date time format to date(d-m-Y) IN add edit detail blade

    public function getJoinDateAttribute($value){         
        return Carbon::parse($value)->format('d-m-Y');
    }
    

    public function getDobAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }


    public function getKnownLanguagesAttribute($known_languages){
        return explode(',',$known_languages);
    }

    public function getCertificatesAttribute($certificates){
        return explode(',',$certificates);
    }
    

    //BELOW FUNCTION USED TO SEND VIEW TO DATABASE in 
    public function setJoinDateAttribute($joinDate) {
        $this->attributes['join_date'] = Carbon::parse($joinDate)->toDateString(); //'toDateTimeString(); use to dd:mm:yyyy:hh:mm:ss
    }
 
    
    public function setDobAttribute($dob)
    {
        $this->attributes['dob'] = Carbon::parse($dob)->toDateString();
    }

     public function setKnownLanguagesAttribute($known_languages) {
        $this->attributes['known_languages'] = implode(",", $known_languages);
    }

     public function setCertificatesAttribute($certificates) {
        $this->attributes['certificates'] = implode(",", $certificates);
    }

}





