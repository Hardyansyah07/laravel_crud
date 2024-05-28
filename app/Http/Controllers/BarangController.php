<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Merek;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Storage;


class BarangController extends Controller
{

    public function viewPDF()
    {
        $barang = Barang::latest()->get();

        $data = [
            'title' => 'Data barang',
            'date' => date('m/d/Y'),
            'barang' => $barang,
        ];

        $pdf = PDF::loadView('barang.export-pdf', $data)
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function index()
    {
        $barang = Barang::with("merek")->latest()->paginate(5);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        // $barang = Merek::all();
        $barang = Merek::all();
        return view('barang.create', compact("barang"));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_barang' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'id_merek' => 'required',
        ]);

        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->id_merek = $request->id_merek;
        // upload image
        $barang->save();
        return redirect()->route('barang.index');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barang' => 'required|min:5',
            'harga' => 'required',
            'stok' => 'required',
            'id_merek' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->id_merek = $request->id_merek;
        // upload image
        //delete old image
        $barang->save();
        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
