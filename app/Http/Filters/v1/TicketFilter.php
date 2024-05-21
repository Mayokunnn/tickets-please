<?php

namespace App\Http\Filters\v1;

class TicketFilter extends QueryFilter
{
    protected $sortable = ['title', 'status',  'createdAt' => 'created_at', 'updatedAt' => 'updated_at'];

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

    public function status($filterValue)
    {
        return $this->builder->whereIn('status', explode(',', $filterValue));
    }

    public function title($value)
    {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('title', 'like', $likeStr);
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
