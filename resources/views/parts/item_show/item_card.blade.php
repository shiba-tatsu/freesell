<div class="col-4 px-5">
  <div class="card" style="height: 270px">
    <div class="leftovers my-2 text-center">
      残り: {{$item->quantity}}品
    </div>
    <div class="price my-2 text-center">
      {{$item->price}}円(税込)
    </div>
    <!-- 購入機能-->

    @if(Auth::check() && Auth::user()->stripe_id !== null)
      <form method='POST' action="{{ route('payment.buy') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="item_name" value="{{$item->name}}">
        <input type="hidden" name="item_price" value={{$item->price}}>
        <input type="hidden" name="item_fee" value={{$item->fee}}>
        <input type="hidden" name="item_id" value="{{$item->id}}">

        <!-- 購入する数-->
        <div class="form-group mt-2 mx-3">
          <label for="name">数量</label>
          <select name="item_quantity">
            @for ($i = 1; $i < $item->quantity; $i++)
              <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
        </div>
          
        <div class="form_group">
          <button type="submit" class="btn bg-primary">購入</button>
        </div>
      </form>
    @endif



    {{--<button class="btn bg-light mt-4 mx-3">
      <a href="{{ route('reviews.create', ['item' => $item->id])}}">
      レビューを書く
      </a>
    </button>--}}
    <div class="btn bg-success">
      <form method='POST' action="{{ route('reviews.store') }}" enctype="multipart/form-data">
        @csrf  
          <input type="hidden" name="item_id" value="{{$item->id}}">
          <review_modal>
          </review_modal>
      </form>
    </div>
    

    
  </div>

  <form method="POST" action="{{ route('chat.create') }}">
    @csrf
      <input name="seller_id" type="hidden" value="{{$item->user->id}}">
      <button type="submit" class="chatForm_btn">出品者に相談する</button>
  </form>

</div>