<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
     public function index() {
        return Komentar::with(['user', 'post'])->get();
    }

    public function store(Request $request) {
        $request->validate([
            'post_id'   => 'required|exists:posts,id',
            'user_id'   => 'required|exists:users,id',
            'komentar'  => 'nullable|string',
        ]);

        return Komentar::create($request->all());
    }

    public function destroy($id) {
        Komentar::destroy($id);
        return response()->json(['message' => 'Komentar deleted.']);
    }
}
