<h4 class="text-center mt-5">{{$item->category->name}}の他の商品</h4>
<div class="row bg-white py-4">
  @foreach($sameCategoryItems as $sameCategoryItem)
    <div class="col-4">
        <a class="card" href="{{route('item.show', ['item' => $sameCategoryItem->id])}}">
            <div class="card-header">{{ $sameCategoryItem->name }}</div>
            {{ $sameCategoryItem->price }}
            <div class="card-body">
                <img src="{{ $sameCategoryItem->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                  
            </div>
            <div class="card-body pt-0 pb-2 pl-3">
                <div class="card-text">
                <item-like
                    :initial-is-liked-by='@json($sameCategoryItem->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($sameCategoryItem->count_likes)'
                      
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('items.like', ['item' => $sameCategoryItem]) }}"
                    >
                </item-like>
                </div>
            </div>
        </a>
    </div>
  @endforeach
</div>