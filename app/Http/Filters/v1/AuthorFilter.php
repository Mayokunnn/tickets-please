<?php

namespace App\Http\Filters\v1;

class AuthorFilter extends QueryFilter
{
    protected $sortable = [
        'name', 'id' , 'createdAt' => 'created_at', 'updatedAt' => 'updated_at', 'emailVerifiedAt' => 'email_verified_at'
    ];

    public function include($value)
    {
        return $this->builder->with($value);
    }

    public function createdAt($value)
    {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->whereDate('created_at', $dates);
    }

    public function id($filterValue)
    {
        return $this->builder->whereIn('id', explode(',', $filterValue));
    }

    public function name($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('name', 'like', $likeStr);
    }

    public function updatedAt($value)
    {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('updated_at', $dates);
        }

        return $this->builder->whereDate('updated_at', $dates);
    }
}
