<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChildGalleryController extends Controller
{
    public function index(Request $request, Child $child)
    {

        $items = $child->getGallery(37);
        $items = array_chunk($items, 3);
        return view('child.gallery.index', ['child' => $child, 'items' => $items]);
    }

    public function upload(Request $request, Child $child)
    {

        Log::info(print_r($request->photo, true));
        Log::info($request->get('type'));

        if ($request->hasFile('photo')) {
            /* @var \Illuminate\Http\UploadedFile $photo */
            $photo = $request->file('photo');
            $type = $request->get('type');
            $name = sprintf('%s.%s', $type, $photo->getClientOriginalExtension());
            $path = sprintf('public/child_galleries/%s/%s', $child->id, $name);
            if ($photo->storeAs($path)) {
                $photo = $child->photos()->where('type', '=', $type)->first();
                if ($photo) {
                    $photo->update([
                        'path' => $name,
                    ]);
                } else {
                    $child->photos()->create([
                        'type' => $type,
                        'path' => $name,
                    ]);
                }
            }
        }
        return response()->json(['success' => 1], 200);

    }
}
