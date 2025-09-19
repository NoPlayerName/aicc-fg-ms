<?php

namespace App\Repositories\Rack;

use App\Models\Master\Rack;

class RackRepository implements RackRepositoryInterface
{
    public function getAll()
    {
        return Rack::get();
    }

    public function getAllActive()
    {
        return Rack::where('is_active', true)->get();
    }

    public function getbyId($id)
    {
        return Rack::find($id);
    }

    public function create($data)
    {
        return Rack::create($data);
    }

    public function update($id, $data)
    {
        $rack = Rack::find($id);
        $rack->update($data);
        return $rack;
    }

    public function delete($id)
    {
        $rack = Rack::find($id);
        $rack->delete();
        return $rack;
    }
}
