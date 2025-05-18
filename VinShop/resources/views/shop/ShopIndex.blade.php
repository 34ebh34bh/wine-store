<form method="GET" action="{{ route('index.shop') }}">
    <!-- Сортировка и фильтры -->
    <select name="sort" onchange="this.form.submit()">
        <option value="">Сортировать по...</option>
        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название A-Z</option>
        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название Z-A</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена по возрастанию</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена по убыванию</option>
    </select>

    <h3>Фильтр по стране</h3>
    @foreach(['Германия', 'Франция', 'Украина', 'Польша'] as $country)
        <label><input type="checkbox" name="regions[]" value="{{ $country }}"
                {{ is_array(request('regions')) && in_array($country, request('regions')) ? 'checked' : '' }}>
            {{ $country }}
        </label><br>
    @endforeach

    <h3>Фильтр по цвету</h3>
    @foreach(['Розовое', 'Красное', 'Белое'] as $color)
        <label><input type="checkbox" name="colors[]" value="{{ $color }}"
                {{ is_array(request('colors')) && in_array($color, request('colors')) ? 'checked' : '' }}>
            {{ $color }}
        </label><br>
    @endforeach

    <button type="submit">Применить</button>
</form>

<hr>

<div id="products-container">
    @include('shop.partials.products', ['ShopVins' => $ShopVins])
</div>

@if($ShopVins->hasMorePages())
    <button id="load-more"
            data-next-page="{{ $ShopVins->currentPage() + 1 }}"
            data-url="{{ request()->fullUrlWithQuery(['page' => $ShopVins->currentPage() + 1]) }}">
        Показать ещё
    </button>
@endif

<script>
    document.getElementById('load-more')?.addEventListener('click', function () {
        let button = this;
        fetch(button.dataset.url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
            .then(res => res.text())
            .then(html => {
                document.getElementById('products-container').insertAdjacentHTML('beforeend', html);
                let nextPage = parseInt(button.dataset.nextPage) + 1;
                const url = new URL(window.location.href);
                url.searchParams.set('page', nextPage);
                button.dataset.url = url.toString();
                button.dataset.nextPage = nextPage;

                if (!html.trim()) {
                    button.remove(); // если ничего не вернули удалить кнопку
                }
            });
    });
</script>
