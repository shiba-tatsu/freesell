<div class="col-9">
  <div class="row justify-content-left">
      @foreach ($items as $item)
          <div class="col-md-4 mb-5">
              <a class="card" href="{{route('item.show', ['item' => $item->id])}}">
                  <div class="card-header text-center">{{ $item->name }}</div>
                  
                  <div class="card-body">
                    
                    @if(count($item->images) >= 1)
                        <img src="{{ $item->images[0]->image }}" alt="image" style="width: 100%; height: auto;"/>
                    @else
                        <img src="" alt="image" style="width: 100%; height: auto;"/>
                    @endif
                      
                  </div>
                  <div class="card-body pt-0 pb-2 pl-3">
                    <div class="card-text">
                      <p class="text-center">{{ $item->price + $item->price}}円</p>  
                      <item-like
                          :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))'
                          :initial-count-likes='@json($item->count_likes)'
                          
                          :authorized='@json(Auth::check())'
                          endpoint="{{ route('items.like', ['item' => $item]) }}"
                          >
                      </item-like>
                      </div>
                  </div>
              </a>
          </div>
      @endforeach
  </div>
</div>