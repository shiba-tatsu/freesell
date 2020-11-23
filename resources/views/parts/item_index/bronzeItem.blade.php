<h5 class="mb-3 pt-4 text-center">{{($bronzeLists[0]->category->parent->name)}}の商品</h5>
<div class="d-flex flex-row mb-5">
            
    @foreach($bronzeLists as $bronzeItem)
      <div class="col-md-4 mb-2">
        <a class="card" href="{{route('item.show', ['item' => $bronzeItem->id])}}">
          <div class="card-header">{{ $bronzeItem->name }}</div>
          {{ $bronzeItem->price }}
          <div class="card-body">
                        
            <img src="{{ $bronzeItem->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                        
          </div>
          <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
              <item-like
                :initial-is-liked-by='@json($bronzeItem->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($bronzeItem->count_likes)'
                            
                :authorized='@json(Auth::check())'
                endpoint="{{ route('items.like', ['item' => $bronzeItem]) }}"
              >
              </item-like>
            </div>
          </div>
        </a>
      </div>
      @endforeach
</div>