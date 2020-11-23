<h5 class="mb-3 pt-3 text-center">{{($silverLists[0]->category->parent->name)}}の商品</h5>
<div class="d-flex flex-row">
            
    @foreach($silverLists as $silverItem)
      <div class="col-md-4 mb-2">
        <a class="card" href="{{route('item.show', ['item' => $silverItem->id])}}">
          <div class="card-header">{{ $silverItem->name }}</div>
          {{ $silverItem->price }}
          <div class="card-body">
                        
            <img src="{{ $silverItem->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                        
          </div>
          <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
              <item-like
                :initial-is-liked-by='@json($silverItem->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($silverItem->count_likes)'
                            
                :authorized='@json(Auth::check())'
                endpoint="{{ route('items.like', ['item' => $silverItem]) }}"
              >
              </item-like>
            </div>
          </div>
        </a>
      </div>
      @endforeach
</div>