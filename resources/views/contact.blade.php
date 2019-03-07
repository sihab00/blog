  @extends('master');
  @section('content')
    <form>
      <h4>Contact Me</h4>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="email" class="form-control" id="subject" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="textarea">Subject</label>
        <textarea id="textarea" class="form-control" placeholder="leave your message"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endsection