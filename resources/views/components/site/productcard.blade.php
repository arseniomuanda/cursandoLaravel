<div class="col s12 m4">
    <div class="card">
        <div class="card-image">
            <img width="300" height="300" src="{{ url("storage/$product->image") }}">
            {{-- @can('ver-produto', $product) --}}
            <a href="{{ route('site.details', $product->slug) }}"
                class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i>
            </a>
            {{-- @endcan --}}
        </div>
        <div class="card-content">
            <span class="card-title">{{ $product->name }}</span>
            <p>{{ Str::limit($product->description, 10, '...') }}</p>
        </div>
    </div>
</div>
