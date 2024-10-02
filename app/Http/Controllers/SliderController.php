<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('tiendaonline.sliderGestionar', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image_path')->store('images/sliders', 'public');

        Slider::create(['image_path' => $imagePath]);

        return redirect()->route('sliderGestionar')->with('success', 'Imagen agregada con éxito.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image_path')) {
            // Eliminar la imagen anterior si existe
            \Storage::disk('public')->delete($slider->image_path);
            $imagePath = $request->file('image_path')->store('images/sliders', 'public');
            $slider->image_path = $imagePath;
        }

        $slider->save();

        return redirect()->route('sliderGestionar')->with('success', 'Imagen actualizada con éxito.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        \Storage::disk('public')->delete($slider->image_path);
        $slider->delete();

        return redirect()->route('sliderGestionar')->with('success', 'Imagen eliminada con éxito.');
    }
}
