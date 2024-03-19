<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::withCount("courses")->get();
        return view("admin.subscription.index", compact("subscriptions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck("name", "id");
        return view("admin.subscription.create", compact("courses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $sub = Subscription::create([
            "name" => $request->validated("name"),
            "description" => $request->validated("description"),
            "price" => $request->validated("price"),
            "active" => $request->validated("active") ? 1 : 0,
        ]);
        $sub->courses()->sync($request->validated("courses_id"));
        return redirect()->route("subscriptions.index")->with("success", "Subsciption is saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub = Subscription::with([
            "courses" => function ($query) {
                $query->withCount("videos");
            }
        ])->findOrFail($id);
        return view("admin.subscription.show", compact("sub"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Subscription::with("courses")->findOrFail($id);
        $courses = Course::pluck("name", "id");
        return view("admin.subscription.edit", compact("sub", "courses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubscriptionRequest $request, $id)
    {
        $sub = Subscription::findOrFail($id);
        $sub->update([
            "name" => $request->validated("name"),
            "description" => $request->validated("description"),
            "price" => $request->validated("price"),
            "active" => $request->validated("active") ? 1 : 0,
        ]);
        $sub->courses()->sync($request->validated("courses_id"));
        return redirect()->route("subscriptions.index")->with("success", "Changes is saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Subscription::findOrFail($id);
        $sub->courses()->sync([]);
        $sub->delete();
        return redirect()->route("subscriptions.index")->with("success", "Subscription is deleted");
    }
}
