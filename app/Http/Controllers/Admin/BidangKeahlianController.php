<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.bidang.index', compact('bidangKeahlian'));
    }

    public function create()
    {
        return view('admin.bidang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);

        BidangKeahlian::create($request->all());

        return redirect()->route('bidang.index')->with('success-bidang-create', 'Bidang Keahlian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        return view('admin.bidang.edit', compact('bidangKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|max:10',
            'bidang_keahlian' => 'required|max:100',
        ]);

        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->update($request->all());

        return redirect()->route('bidang.index')->with('success-bidang-edit', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->delete();

        return redirect()->route('bidang.index')->with('success-bidang-delete', 'Data berhasil dihapus');
    }
}
