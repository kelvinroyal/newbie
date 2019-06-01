@extends('backend.master')
@section('main')
@section('title','Add model')
@section('title2','Models')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Add model</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Model's name</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_model" placeholder="Model's name" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Avatar</label>

        <div class="col-sm-10">
          <input type="file" name="avatar_model" onchange="changeImg(this)" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Cover</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="cover_model" placeholder="Link cover photo... 2030x1351" required="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Information</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="info_model" id="info"></textarea>
          <script type="text/javascript">
            CKEDITOR.replace('info');
          </script>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="continents_model" class="form-control" rel="cont" required="">
            <option value="unselect" selected="">Select Continent</option>
            @foreach($cont as $c)
            <option value="{{$c->id_continents}}">{{$c->name_continents}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select name="nation_model" class="form-control" rel="nation" required="">
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>

        <div class="col-sm-10">
          <input type="radio" name="status" value="0" checked="checked">None<br>
          <input type="radio" name="status" value="1" >Featured<br>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Facebook</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="facebook" placeholder="Facebook">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Instagram</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="instagram" " placeholder="Instagram">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Twitter</label>

        <div class="col-sm-10">
          <input type="text" class="form-control" name="twitter" placeholder="Twitter">
        </div>
      </div>              
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <button type="reset" name="reset" class="btn btn-default">Reset</button>
    </div>

  <!-- /.box-body -->

  <!-- /.box-footer -->
  {{csrf_field()}}
</form>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="cont"]').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/nation') }}",
        data: { idcont: id }
      }).done(function(data){
        $('[rel="nation"]').html(data)
      });

    });

  });

</script>
@stop