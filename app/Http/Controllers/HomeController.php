<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Tags\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Create a to-do item.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'content' => 'max:255',
            'tags' => 'nullable',
            'due_at' => 'nullable|date'
        ]);

        /** @noinspection PhpUndefinedMethodInspection */
        $todo = Auth::user()->todos()->create([
            "subject" => $request->input('subject'),
            'content' => $request->input('content'),
            'due_at' => $request->input('due_at'),
        ]);

        foreach ($request->input('tags') as $key => $tag)
            /** @noinspection PhpUndefinedMethodInspection */
            $todo->attachTag(Tag::findOrCreate($tag));

        return redirect("todos/{$todo->id}");
    }

    /**
     * Show the to-do list.
     *
     * @return Renderable
     */
    public function todos()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return view('todos', ["todos" => Auth::user()->todos]);
    }

    /**
     * Show a to-do item.
     *
     * @param Todo $todo
     * @return Renderable
     */
    public function todo(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) abort(403);
        return view('todo', ["todo" => $todo]);
    }

    /**
     * Delete a to-do item.
     *
     * @param Todo $todo
     * @return RedirectResponse
     */
    public function delete(Todo $todo)
    {
        if ($todo->user_id !== Auth::id())
            return redirect()->route('todos')->with('notify', 'You are not authorized to delete that!');

        try {
            $todo->delete();
        } catch (\Exception $e) {
            return redirect()->route('todos')->with('notify', 'Something went wrong!');
        }

        return redirect()->route('todos')->with('notify', 'Item Deleted!');
    }
}
