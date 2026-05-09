<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    // Dashboard - Menampilkan semua barang, statistik, dan fitur pencarian/filter.
    public function index(Request $request)
    {
        $query = Item::with('category');

        // Pencarian berdasarkan nama
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $items = $query->paginate(10);
        $categories = Category::all();

        // Hitung stok menipis (< 20)
        $stokMenipis = Item::where('stock', '<', 20)->where('stock', '>', 0)->count();

        // Hitung stok habis (0)
        $stokHabis = Item::where('stock', 0)->count();

        return view('dashboard', compact('items', 'categories', 'stokMenipis', 'stokHabis'));
    }

    // BAGIAN BARANG (ITEM)
    public function createItem()
    {
        $categories = Category::all();
        return view('tambah_item', compact('categories'));
    }

    public function storeItem(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Item::create($data);
        return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function showItem($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('detail_item', compact('item'));
    }

    public function editItem($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('edit_item', compact('item', 'categories'));
    }

    public function updateItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($item->photo) {
                Storage::disk('public')->delete($item->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $item->update($data);
        return redirect()->route('dashboard')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);

        if ($item->photo) {
            Storage::disk('public')->delete($item->photo);
        }

        $item->delete();
        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus secara permanen!');
    }

    // BAGIAN KATEGORI (CATEGORY)

    public function indexCategory()
    {
        $categories = Category::withCount('items')->get();
        return view('category_index', compact('categories'));
    }

    public function createCategory()
    {
        return view('category_create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->only('name', 'description'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('category_edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'description'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);

        // Langkah manual: Cari semua barang yang pakai kategori ini, lalu buat jadi null
        \App\Models\Item::where('category_id', $id)->update(['category_id' => null]);

        // Baru setelah itu hapus kategorinya
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus dan barang dipindahkan ke tidak berkategori.');
    }
}
