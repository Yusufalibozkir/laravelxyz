<?php
class Posts extends Eloquent{
    public function user(){
        return $this->belongsTo('Users');
    }
}