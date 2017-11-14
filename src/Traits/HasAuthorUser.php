<?php

namespace BinaryCabin\LaravelAuthor\Traits;

trait HasAuthorUser{

    public static function bootHasAuthorUser(){
        static::creating(function($model) {
            $authorUserIdFieldName = $model->getAuthorUserIdFieldName();
            if(empty($model->$authorUserIdFieldName) && \Auth::user()){
                $model->$authorUserIdFieldName = \Auth::user()->id;
            }
        });
    }

    public function getAuthorUserIdFieldName(){
        if(!empty($this->authorUserIdFieldName)){
            return $this->authorUserIdFieldName;
        }
        return 'author_user_id';
    }

    public function authorUser(){
        return $this->belongsTo(\App\User::class,$this->getAuthorUserIdFieldName());
    }

    public function scopeByAuthorUser($query, $authorUserId){
        return $query->where($this->getAuthorUserIdFieldName(),$authorUserId);
    }

}