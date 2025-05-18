@foreach($ShopVins as $ShopVin)
    <div class="product">
        <h3>{{ $ShopVin->name }}</h3>
        <p>Цена: {{ $ShopVin->price }}</p>
        <p>Год: {{ $ShopVin->year }}</p>
        <p>Объём: {{ $ShopVin->volume }}</p>
        <p>Цвет: {{ $ShopVin->color }}</p>
        <p>Крепость: {{ $ShopVin->Fortress }}</p>
        <p>Регион: {{ $ShopVin->Region }}</p>
        <img src="{{ $ShopVin->image }}" style="width: 100px">
    </div>
@endforeach
