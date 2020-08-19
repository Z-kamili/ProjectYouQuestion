<div class="form-group">
    <input type="text" class="form-control" name="titre" value="{{old('titre',$posts->titre ?? null)}}" id="subject" placeholder="Title"/>
  </div>
  <div class="form-group">
      <select class="form-control" name="ID_opt" id="subject">
        <option value="{{ $option->id }}">{{$option->Desc}}</option>
        @foreach($alloption as $item)
        @if($item->id != $option->id)
        <option value="{{ $item->id }}">{{$item->Desc}}</option>  
        @endif 
          @endforeach
      </select>

    {{-- <input type="text" class="form-control" name="password" id="subject" placeholder="text"/>
    <div class="validate"></div> --}}
  </div>
  <div class="form-group">
    <textarea class="form-control" id="summary-ckeditor" name="Desc" >
        {{$posts->Desc}}
    </textarea>
    <div class="validate"></div>
  </div>
  
      {{-- {{$image->path}} --}}
   
    <div class="custom-file">
        <input type="file" class="custom-file-input"  name="image" accept="image/*" id="customFileLang" >
        <label class="custom-file-label" for="customFileLang">choose image</label>
      </div>
  @if($errors->any())
  <ul>
  @foreach ($errors->all() as $error)
  <li style="color: red;margin-left:10px">{{$error}}</li>            
  @endforeach
  </ul>
  @endif
  
  <div class="text-center"><button type="submit" class="btn-update">Update</button></div>
</form>
</div>

</div>

</div>
</section><!-- End Contact Section -->

<!-- ======= Map Section ======= -->

</main><!-- End #main -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>

