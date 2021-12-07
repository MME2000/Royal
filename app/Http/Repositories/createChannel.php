<?php

namespace App\Repositories;

use App\Models\Channel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;

class createChannel
{

    public function all()
    {
       return Channel::all();
    }

    public function create($request)
    {
        Channel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
    }

    public function update($request,$channel)
    {
        $channel->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    public function delete($channel)
    {
        $channel->delete();
    }
}
