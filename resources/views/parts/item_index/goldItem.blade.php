<h5 class="mb-3 pt-5 text-center">{{($goldLists[0]->category->parent->name)}}の商品</h5>
<div class="d-flex flex-row">
            
    @foreach($goldLists as $goldItem)
      <div class="col-md-4 mb-4">
        <a class="card" href="{{route('item.show', ['item' => $goldItem->id])}}">
          <div class="card-header text-center">{{ $goldItem->name }}</div>
          <div class="card-body">
                        
            <img src="{{ $goldItem->images[0]->image }}" alt="image" style="width: 100%; height: auto;"/>
                        
          </div>
          <div class="card-body pt-0 pb-2 pl-3">
            <div class="card-text">
              <p class="text-center">{{ $goldItem->price + $goldItem->fee }}円(送料込み)</p>
              <item-like
                :initial-is-liked-by='@json($goldItem->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($goldItem->count_likes)'
                            
                :authorized='@json(Auth::check())'
                endpoint="{{ route('items.like', ['item' => $goldItem]) }}"
              >
              </item-like>
            </div>
          </div>
        </a>
      </div>
      @endforeach
</div>