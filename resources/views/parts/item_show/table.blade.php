<table class="table table-bordered table-active">
  <thead>
    <tr>
      <th scope="col">商品の状態</th>
      <th scope="col">配送料の負担</th>
      <th scope="col">発送元の地域</th>
      <th scope="col">発送までの日数</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ Config::get('status')[$item->status] }}</th>
      <td>{{$item->fee}}円</td>
      <td>{{ Config::get('region')[$item->region] }}</td>
      <td>{{$item->delivery_day}}日 程度</td>
    </tr>
  </tbody>
</table>