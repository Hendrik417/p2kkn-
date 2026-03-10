<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrequentlyAskedQuestions;

class FaqsController extends Controller
{

    // menampilkan data
    public function index()
    {
        $faqs = FrequentlyAskedQuestions::all();
        return view('faqs.index', compact('faqs'));
    }



    // form tambah
    public function create()
    {
        return view('faqs.create');
    }

    // simpan data
    public function store(Request $request)
    {
     $request->validate([
         'question' => 'required',
         'answer' => 'required',
         'is_published' => 'required',
         'view_count' => 'nullable|numeric'
        ]);

        FrequentlyAskedQuestions::create ([
            'question' => $request->questions,
             'answer' => $request->answers,
              'is_published' => $request->is_published,
            'view_count' => $request->view_count
        ]);


        return redirect()->route('faqs.index')
            ->with('success','FAQ berhasil ditambahkan');
    }

    // form edit
    public function edit($id)
    {
        $faq = FrequentlyAskedQuestions::findOrFail($id);
        return view('faqs.edit', compact('faq'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'questions' => 'required',
            'answers' => 'required',
            'is_published' => 'required',
            'view_count' => 'nullable|numeric'
        ]);

        $faq = FrequentlyAskedQuestions::findOrFail($id);

        $faq->update([
            'questions' => $request->questions,
            'answers' => $request->answers,
            'is_published' => $request->is_published,
            'view_count' => $request->view_count
        ]);

        return redirect()->route('faqs.index')
            ->with('success','FAQ berhasil diupdate');
    }

    // hapus data
    public function destroy($id)
    {
        $faq = FrequentlyAskedQuestions::findOrFail($id);
        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('success','FAQ berhasil dihapus');
    }
}
