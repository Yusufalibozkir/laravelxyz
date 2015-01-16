<?php
class Comments extends Eloquent{
    protected $fillable = array('user_id');
    public function user(){
        return $this->belongsTo('Users');
    }
}
    