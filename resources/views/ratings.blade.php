@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rate the teacher</div>


                    <form method="POST" action={{Route('ratings')}}>
                      @csrf
                      <div class="form-group">
                        <label for="">Rate your teacher</label><br>
                        <div class="rating">
                          <input id="star5" name="rating" type="radio" value="5" class="radio-btn hide" />
                          <label for="star5"><i class="fa fa-star"></i></label>
                          <input id="star4" name="rating" type="radio" value="4" class="radio-btn hide" />
                          <label for="star4"><i class="fa fa-star"></i></label>
                          <input id="star3" name="rating" type="radio" value="3" class="radio-btn hide" />
                          <label for="star3"><i class="fa fa-star"></i></label>
                          <input id="star2" name="rating" type="radio" value="2" class="radio-btn hide" />
                          <label for="star2"><i class="fa fa-star"></i></label>
                          <input id="star1" name="rating" type="radio" value="1" class="radio-btn hide" />
                          <label for="star1"><i class="fa fa-star"></i></label>
                          <div class="clear"></div>
                        </div>
                      </div>
                       <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Which language did you learn?</label>
                          <select name="language" class="form-control rounded">
                              <option value="" selected>Choose</option>
                              <option value="1">English</option>
                              <option value="2">French</option>
                              <option value="3">Italian</option>
                              <option value="4">Spanish</option>
                              <option value="5">Portuguese</option>
                          </select>
                        </div>
                      <div class="form-group">
                        <label for="">How many lessons did you take?</label>
                        <input type="number" name="lessoncount" class="form-control rounded">
                      </div>
                      <div class="form-group">
                        <label for="">Please write your review</label>
                        <!-- <label for="message-text" class="col-form-label">Message:</label> -->
                        <textarea class="form-control rounded" id="message-text" name="review"  rows="4"></textarea>
                      </div>
                      <div class="form-group text-center mb-5">
                        <button type="submit" class="btn btn-primary btn-lg rounded pl-5 pr-5"><b>SEND</b></button>
                       </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
