<div class="modal-dialog" role="document">
  <div class="modal-content">

    {!! Form::open(['url' => action('BrandController@update', [$brand->id]), 'method' => 'PUT', 'id' => 'brand_edit_form', 'class' => 'form-horizontal' ]) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Edit Brand</h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        {!! Form::label('name','Brand Name:*', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-9">
          {!! Form::text('name', $brand->name, ['class' => 'form-control', 'required', 'placeholder' => 'Brand name']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('description','Short Description:', ['class' => 'col-sm-3 control-label']) !!}

        <div class="col-sm-9">
          {!! Form::text('description', $brand->description, ['class' => 'form-control','placeholder' => 'Short Description']); !!}
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Update</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->