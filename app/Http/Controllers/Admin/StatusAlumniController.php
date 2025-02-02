<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\StatusAlumni;
use Illuminate\Http\Request;

class StatusAlumniController extends Controller
{
    public function index()
    {
        $statuses = StatusAlumni::all();
        return view('admin.status-alumni.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.status-alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|max:25',
        ]);

        StatusAlumni::create($request->all());
        return redirect()->route('status-alumni.index')->with('success-status-create', 'Status Alumni created successfully.');
    }

    public function edit(StatusAlumni $status_alumni)
    {
        return view('admin.status-alumni.edit', compact('status_alumni'));
    }

    public function update(Request $request, StatusAlumni $status_alumni)
    {
        $request->validate([
            'status' => 'required|max:25',
        ]);

        $status_alumni->update($request->all());
        return redirect()->route('status-alumni.index')->with('success-status-edit', 'Status Alumni updated successfully.');
    }
    public function destroy($id)
    {
        $statuses = StatusAlumni::findOrFail($id);
        $statuses->delete();

        return redirect()->route('status-alumni.index')->with('success-status-delete', 'status berhasil dihapus.');
    }
}