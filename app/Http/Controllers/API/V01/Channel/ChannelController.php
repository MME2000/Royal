<?php

namespace App\Http\Controllers\API\V01\Channel;

use App\Models\Channel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\createChannel;
use Symfony\Component\HttpFoundation\Response;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(resolve(createChannel::class)->all(),Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        resolve(createChannel::class)->create($request);

        return response()->json('created channel successfuly',Response::HTTP_CREATED);

    }

    public function update(Request $request, Channel $channel)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        resolve(createChannel::class)->update($request,$channel);

        return response()->json([
            'message' => 'channel edited successfully',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {

        resolve(createChannel::class)->delete($channel);

        return response()->json([
            'message' => 'channel deleted successfuly']
            ,Response::HTTP_OK);
    }
}
