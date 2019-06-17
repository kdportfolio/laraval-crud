<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Main;
class MainController extends Controller
{
    public function index()
    {
        $users = Main::latest()->paginate(10);
        return view('users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        Main::create($request->all());
        return redirect()->route('users.index')
                        ->with('success','Main created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Main $user)
    {
        return view('users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $user)
    {
        return view('users.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Main $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('users.index')
                        ->with('success','Main updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Main::destroy($id);
        return redirect()->route('users.index')
                        ->with('success','Main deleted successfully');
    }
}