<h4 class="text-center mt-5 mb-4">商品レビュー</h4>
<div class="itemReview row">
  <div class="col-3 reviewAverage bg-white ml-5">
    <h5 class="text-center mt-4">平均評価</h5>
    <div class="starAverage ml-5">
      <star-rating :increment="0.5" rating="{{$reviewAverage}}" 
      read-only="true" :show-rating="false">
      </star-rating>
      <h5 class="mt-4">{{$reviewAverage}}点</h5>
    </div>
  </div>

  <div class="col-1">
  </div>

  <div class="col-7 bg-white">
    <div class="reviews">
    @foreach($reviews as $review)
      <div class="review">
        <a class="fas fa-user-circle fa-3x text-primary" href="{{ route('users.show', ['user' => $review->user->id])}}">
          {{$review->user->name}}
        </a>
        <div class="d-flex justify-content-start">
          <star-rating :increment="0.5" rating="{{$review->star}}" 
          read-only="true" :show-rating="false" :star-size="20"></star-rating>
          {{$review->title}}
        </div>
        <p>{{$review->body}}</p>
      </div>
      
    @endforeach
    </div>
  </div>
</div>