<?php

namespace App\Http\Controllers\Admin; // 🟢 FIX: Normalisasi PSR-4 Namespace (Admin dengan huruf kapital A)

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman semua produk untuk publik (/products/semua-produk)
     */
    public function publicIndex()
    {
        $products = Product::where('is_active', 1)->latest()->get();

        return view('products.semua-produk', compact('products'));
    }

    /**
     * Menampilkan detail produk untuk publik berdasarkan slug (/products/{slug})
     */
    public function publicShow($slug)
    {
        return $this->show($slug);
    }

    /**
     * Menampilkan index manajemen produk di Dashboard Admin
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('pages.admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('pages.admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features'    => 'nullable|array',
            'faqs'        => 'nullable|array',
            'licenses'    => 'nullable|array',
        ]);

        $jsonData = [
            'hero_badge'         => $request->input('hero_badge', 'Geotechnical Software'),
            'hero_description'   => $request->input('description'),
            'about_title'        => $request->input('about_title', 'Solusi Andal Analisis Geoteknik'),
            'about_p1'           => $request->input('about_description'),
            'about_p2'           => $request->input('about_p2'),
            'about_partner_note' => $request->input('about_partner_note'),
            'video_url'          => $request->input('video_url'), 
            'youtube_id'         => $this->getYoutubeId($request->input('video_url')) ?? 'dQw4w9WgXcQ', 
            'video_title'        => $request->input('video_title', 'Saksikan Demonstrasi Perangkat Lunak'),
            'features_list'      => $request->input('features'),
            'faqs_list'          => $request->input('faqs'),
            'licenses_list'      => $request->input('licenses'), 
        ];

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name) . '-' . Str::lower(Str::random(5));
        $product->description = json_encode($jsonData);
        $product->is_active = $request->has('is_active');
        
        if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('products', 'public');
        }
        
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dibuat.');
    }

    public function edit(Product $product)
    {
        return view('pages.admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'features'    => 'nullable|array',
            'faqs'        => 'nullable|array',
            'licenses'    => 'nullable|array',
        ]);

        $jsonData = [
            'hero_badge'         => $request->input('hero_badge', 'Geotechnical Software'),
            'hero_description'   => $request->input('description'), 
            'about_title'        => $request->input('about_title', 'Solusi Andal Analisis Geoteknik'),
            'about_p1'           => $request->input('about_description'), 
            'about_p2'           => $request->input('about_p2'),
            'about_partner_note' => $request->input('about_partner_note'),
            'video_url'          => $request->input('video_url'), 
            'youtube_id'         => $this->getYoutubeId($request->input('video_url')) ?? 'dQw4w9WgXcQ', 
            'video_title'        => $request->input('video_title', 'Saksikan Demonstrasi Perangkat Lunak'),  
            'features_list'      => $request->input('features'), 
            'faqs_list'          => $request->input('faqs'),
            'licenses_list'      => $request->input('licenses'),   
        ];

        if ($request->hasFile('image')) {
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $product->image_path = $request->file('image')->store('products', 'public');
        }

        if ($product->name !== $request->name) {
            $product->slug = Str::slug($request->name) . '-' . Str::lower(Str::random(5));
        }

        $product->name = $request->name;
        $product->description = json_encode($jsonData);
        $product->is_active = $request->has('is_active');
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Menampilkan halaman detail satu produk
     */
    public function show($idOrSlug)
    {
        $product = Product::where('id', $idOrSlug)
            ->orWhere('slug', $idOrSlug)
            ->firstOrFail();

        $details = json_decode($product->description, true) ?? [];

        $data = [
            'product'            => $product,
            'hero_badge'         => $details['hero_badge'] ?? 'PREMIUM SOLUTION',
            'hero_description'   => $details['hero_description'] ?? '',
            'about_title'        => $details['about_title'] ?? 'TENTANG PRODUK',
            'about_p1'           => $details['about_p1'] ?? '',
            'about_p2'           => $details['about_p2'] ?? '',
            'about_partner_note' => $details['about_partner_note'] ?? '',
            'youtube_id'         => $details['youtube_id'] ?? 'dQw4w9WgXcQ',
            'video_title'        => $details['video_title'] ?? 'Video Demonstrasi Produk',
            'features'           => $details['features_list'] ?? [], 
            'faqs'               => $details['faqs_list'] ?? [],
            'licenses'           => $details['licenses_list'] ?? [],     
        ];

        return view('products.detail', $data);
    }

    private function getYoutubeId($url)
    {
        if (empty($url)) return null;
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:products,id',
        ]);

        $products = Product::whereIn('id', $request->ids)->get();

        foreach ($products as $product) {
            if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
                Storage::disk('public')->delete($product->image_path);
            }
            $product->delete();
        }

        return redirect()->back()->with('success', count($request->ids) . ' produk terpilih berhasil dihapus massal.');
    }
}