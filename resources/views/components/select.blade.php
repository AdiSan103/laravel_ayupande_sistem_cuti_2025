<div class="col-12">
  <h6>{{ $title }}</h6>
  <fieldset class="form-group">
    <select class="form-select" id="basicSelect" name="{{$name}}">

      <!-- old input -->
      @foreach($items as $item)
        @if(old($name) == $item->no)
          <option value="{{$item->no}}">{{$item->$item_label}}</option>
        @endif
      @endforeach

      <!-- input before -->
      @foreach($items as $item)
        @if($another_old_input == $item->no)
          <option value="{{$item->no}}">{{$item->$item_label}}</option>
        @endif
      @endforeach

      <!-- another option select -->
      @foreach($items as $item)
        @if(old($name) != $item->no && $another_old_input != $item->no)
          <option value="{{$item->no}}">{{$item->$item_label}}</option>
        @endif
      @endforeach
    </select>
  </fieldset>
</div>