<div class="col-3 mr-4 bg-white">
  <h1>検索</h1>

  <form action="{{ route('item.refined') }}" method="GET">
      <p>キーワード<br>
          <input type="text" name="keyword" value="{{$keyword}}">
      </p>
      <p>料金<br>
          <input type="number" name="minPrice">以上
          <input type="number" name="maxPrice">以下</p>
      </p>
      
      <p>商品の状態<br></p>
      <div class="row">
          <div class="col-6"><input type="checkbox" class="status-search" name="status[]" value="1">新品</div>
          <div class="col-6"><input type="checkbox" class="status-search" name="status[]" value="2">未使用に近い</div>
          <div class="col-6"><input type="checkbox" name="status[]" value="3">目立った傷や汚れなし</div>
          <div class="col-6"><input type="checkbox" name="status[]" value="4">やや傷や汚れあり</div>
          <div class="col-6"><input type="checkbox" name="status[]" value="5">傷や過れあり</div>
          <div class="col-6"><input type="checkbox" name="status[]" value="6">全体的に状態が悪い</div>
      </div>
          
      <p>発送日<br>
          <input type="number" name="delevery_day">以内
      </p>

      <p><input type="submit" value="検索"></p>
  </form>

</div>