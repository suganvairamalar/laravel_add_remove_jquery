<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'mark1', 'mark2', 'mark3', 'mark4', 'mark5', 'total', 'percentage', 'rank'];

   /* public function getStudentIdAttribute($student_id){
        return explode(',',$student_id);
    }

    public function getMark1Attribute($mark1){
        return explode(',',$mark1);
    }

    public function getMark2Attribute($mark2){
        return explode(',',$mark2);
    }

    public function getMark3Attribute($mark3){
        return explode(',',$mark3);
    }

    public function getMark4Attribute($mark4){
        return explode(',',$mark4);
    }

    public function getMark5Attribute($mark5){
        return explode(',',$mark5);
    }

    public function getTotalAttribute($total){
        return explode(',',$total);
    }

    public function getPercentageAttribute($percentage){
        return explode(',',$percentage);
    }

    public function getRankAttribute($rank){
        return explode(',',$rank);
    }

    public function setStudentIdAttribute($student_id){
        $this->attributes['student_id'] = implode(",", $student_id);
    }

    public function setMark1Attribute($mark1){
        $this->attributes['mark1'] = implode(",", $mark1);
    }

    public function setMark2Attribute($mark2){
        $this->attributes['mark2'] = implode(",", $mark2);
    }

    public function setMark3Attribute($mark3){
        $this->attributes['mark3'] = implode(",", $mark3);
    }

    public function setMark4Attribute($mark4){
        $this->attributes['mark4'] = implode(",", $mark4);
    }

    public function setMark5Attribute($mark5){
        $this->attributes['mark5'] = implode(",", $mark5);
    }

    public function setTotalAttribute($total){
        $this->attributes['total'] = implode(",", $total);
    }

    public function setPercentageAttribute($percentage){
        $this->attributes['percentage'] = implode(",", $percentage);
    }

    public function setRankAttribute($rank){
        $this->attributes['rank'] = implode(",", $rank);
    }

*/
    
}
