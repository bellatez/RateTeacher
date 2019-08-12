<div class="modal text-left" tabindex="-1" id="editModal" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="text-center">Write Review</h4>
      </div>
      <div class="modal-body">
       <form method="POST" action={{Route('ratings.update', $userRating->id)}}>
         @csrf
         <div class="form-group">
           <label for="">Rate your teacher</label><br>
           <div class="rating">
             <input id="star5" name="rating" type="radio"  value="5" {{$userRating->rating == 5 ? 'checked' : ''}} class="radio-btn hide" />
             <label for="star5"><i class="fa fa-star"></i></label>
             <input id="star4" name="rating" type="radio" value="4" {{$userRating->rating == 4 ? 'checked' : ''}} class="radio-btn hide" />
             <label for="star4"><i class="fa fa-star"></i></label>
             <input id="star3" name="rating" type="radio" value="3" {{$userRating->rating == 3 ? 'checked' : ''}} class="radio-btn hide" />
             <label for="star3"><i class="fa fa-star"></i></label>
             <input id="star2" name="rating" type="radio" value="2" {{$userRating->rating == 2 ? 'checked' : ''}} class="radio-btn hide" />
             <label for="star2"><i class="fa fa-star"></i></label>
             <input id="star1" name="rating" type="radio" value="1" {{$userRating->rating == 1 ? 'checked' : ''}} class="radio-btn hide" />
             <label for="star1"><i class="fa fa-star"></i></label>
             <div class="clear"></div>
           </div>
         </div>
          <div class="form-group">
             <label for="recipient-name" class="col-form-label">Which language did you learn?</label>
             <select name="language" class="form-control rounded" required>
                 <option value="{{$userRating->language}}" selected>{{$userRating->language}}</option>
                 <option value="1">English</option>
                 <option value="2">French</option>
                 <option value="3">Italian</option>
                 <option value="4">Spanish</option>
                 <option value="5">Portuguese</option>
             </select>
           </div>
         <div class="form-group">
           <label for="">How many lessons did you take?</label>
           <input type="number" required name="lessoncount" class="form-control rounded" value="{{$userRating->lessoncount}}">
         </div>
         <div class="form-group">
           <label for="">Please write your review</label>
           <!-- <label for="message-text" class="col-form-label">Message:</label> -->
           <textarea required class="form-control rounded" id="message-text" name="review"  rows="4">{{$userRating->review}}</textarea>
         </div>
         <div class="form-group text-center mb-5">
           <button type="submit" class="btn btn-primary btn-lg rounded pl-5 pr-5"><b>SEND</b></button>
          </div>
       </form>  
      </div>
    </div>
  </div>
</div>