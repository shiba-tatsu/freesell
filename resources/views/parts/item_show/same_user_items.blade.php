<h4 class="text-center mt-5">{{$item->user->name}}様の他の商品</h4>
<div class="row bg-white py-4">
  @foreach($sameUserItems as $sameUserItem)
    <div class="col-4">
        <a class="card" href="{{route('item.show', ['item' => $sameUserItem->id])}}">
            <div class="card-header">{{ $sameUserItem->name }}</div>
            {{ $sameUserItem->price }}
            <div class="card-body">
                <img src="{{ $sameUserItem->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                  
            </div>
            <div class="card-body pt-0 pb-2 pl-3">
                <div class="card-text">
                <item-like
                    :initial-is-liked-by='@json($sameUserItem->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($sameUserItem->count_likes)'
                      
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('items.like', ['item' => $sameUserItem]) }}"
                    >
                </item-like>
                </div>
            </div>
        </a>
    </div>
  @endforeach
</div>
  
