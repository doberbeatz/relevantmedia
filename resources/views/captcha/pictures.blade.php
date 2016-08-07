<div class="form-group">
    <p class="text-center"><b>Select a car</b></p>
    @foreach($pictures as $picture)
        <div class="col-sm-4">
            <input type="radio" name="captcha" value="{{ $picture['hash'] }}">
            <img src="{{ $picture['url'] }}" alt="">
        </div>
    @endforeach
</div>