@extends('layouts/app')
    
@section('content')
 
    @php
      $user = false;
    @endphp
    <div class="wrap">

    <section class="site-section pt-5">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="row">
              <div class="col-md-12">
                <h2 class="mb-4">Hi There! I'm Jane Doe</h2>
                <h2 class="mb-4">Italian Teacher</h2>
                <p class="mb-5"><img src="{{asset('images/teacher.jpg')}}" alt="Image placeholder" class="img-fluid"></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum minima eveniet recusandae suscipit eum laboriosam fugit amet deleniti iste et. </p>
                
              </div>
            </div>

            <div class="row mb-5 mt-5">
              <div class="col-md-12 mb-5">
                <h2>Reviews for Jane Doe</h2>
                <hr>
              </div>
              @foreach($ratings as $rating)
              @guest
              @else
                @if($rating->user_id == Auth()->user()->id)
                  @php
                    $user = true;
                  @endphp
                @endif
              @endguest
                <div class="col-md-12 card">
                  <div class="card-body">
                      <span>
                        <h2>{{ $rating->user_name }}</h2>
                        <div class="post-meta" style="font-size: 20px;">
                          <span>{{$rating->created_at->diffForHumans()}}</span><br>
                          <b>Rated: </b>
                          @for($star = 1; $star <= 5; $star ++ )
                              @if($rating->rating>=$star)
                                  <i class="fa fa-star" style="font-weight: 900; color: #FFD700;"></i>
                              @else
                                  <i class="fa fa-star-o" style="color: #919090;"></i>
                              @endif
                          @endfor
                        </div>
                        <p>Took <b>{{$rating->lessoncount}}</b> lessons in <b>{{$rating->language}}</b></p>
                        <span>{{$rating->review}}</span>
                      </span>
                  </div>
                  <!-- END post -->
                </div>
              @endforeach
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <div class="bio-body">
                  <h2>Ratings</h2>
                  <div class="mt-1 d-none d-md-block">
                      @for($star = 1; $star <= $totalRatings; $star ++ )
                        <i style="color: #FFD700;" class="fa fa-star"></i>
                      @endfor
                      @if(strpos($totalRatings,'.'))
                        <i style="color: #FFD700;" class="fa fa-star-half-o"></i>
                      @else
                        @php
                          $star-=1;
                        @endphp
                      @endif
                      @while ($star<5)
                        <i class="fa fa-star-o"></i>
                        @php
                          $star++;
                        @endphp
                      @endwhile
                      <p>Rated: {{number_format((float)$totalRatings, 2, '.', '')}} out of 5</p>
                      <p>Rated by <b>{{$totalStudents}}</b> student(s)</p>
                      @guest
                        <p><a href="{{route('login')}}" class="btn btn-success btn-sm rounded"><i class="fa fa-sign-in"></i> Login to Rate</a></p>
                      @else
                        @if($user == true)
                          @foreach($userRating as $userRating)
                            @include('ratings-edit')
                            <p><a href="#" data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-sm rounded"><i class="fa fa-edit"></i> Edit your rating</a></p>
                            <p><a href="#" id="confirm-delete" data-item-id="{{$userRating->id}}" class="btn btn-danger btn-sm rounded"><i class="fa fa-trash"></i> Delete your rating</a>
                            </p>
                          @endforeach
                        @else
                          <p><a href="#" data-toggle="modal" data-target="#ratingsModal" class="btn btn-success btn-sm rounded"><i class="fa fa-thumbs-up"></i> Rate This teacher</a></p>
                        @endif
                      @endguest
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
        </div>
      </div>
    </section>
  </div>
  @include('ratings-modal')
@endsection
    