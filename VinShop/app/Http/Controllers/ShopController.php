<?php

namespace App\Http\Controllers;

use App\Models\shopvin;
use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;


class ShopController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $ShopQuery = ShopVin::query();

        // Фильтр по регионам
        if ($request->has('regions')) {
            $ShopQuery->whereIn('Region', $request->regions);
        }

        // Фильтр по цвету
        if ($request->has('colors')) {
            $ShopQuery->whereIn('color', $request->colors);
        }

        // Сортировка
        if ($request->sort == 'name_asc') {
            $ShopQuery->orderBy('name', 'asc');
        } elseif ($request->sort == 'name_desc') {
            $ShopQuery->orderBy('name', 'desc');
        } elseif ($request->sort == 'price_asc') {
            $ShopQuery->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $ShopQuery->orderBy('price', 'desc');
        }

        if ($request->filled('name')) {
            $ShopQuery->where('name', 'like', '%' . $request->name . '%');
        }

        // Сортировка по алфавиту и цене
        if ($request->sort == 'name_asc') {
            $ShopQuery->orderBy('name', 'asc');
        } elseif ($request->sort == 'name_desc') {
            $ShopQuery->orderBy('name', 'desc');
        } elseif ($request->sort == 'price_asc') {
            $ShopQuery->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $ShopQuery->orderBy('price', 'desc');
        }


        $ShopVins = $ShopQuery->paginate(9)->withQueryString();
        if ($request->ajax()) {
            // пагинация
            // Возвращаем только товары, без всей страницы
            return view('shop.partials.products', compact('ShopVins'))->render();
        }

        return view('shop.ShopIndex', compact('ShopVins'));
    }
}
