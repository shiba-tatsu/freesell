<div class="col-8">
  <div class="row justify-content-left">
      @foreach ($items as $item)
          <div class="col-md-4 mb-2">
              <a class="card" href="{{route('item.show', ['item' => $item->id])}}">
                  <div class="card-header">{{ $item->name }}</div>
                  {{ $item->price }}
                  <div class="card-body">
                      <img src="{{ $item->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                      
                  </div>
                  <div class="card-body pt-0 pb-2 pl-3">
                      <div class="card-text">
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