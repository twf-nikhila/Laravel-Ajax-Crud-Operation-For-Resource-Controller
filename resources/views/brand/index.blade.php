@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Brands
        <small>Manage your brands</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title">Data Table With Full Features</h3>
        	<div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                	data-href="{{action('BrandController@create')}}" 
                	data-container=".brands_modal">
                	<i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="box-body">
        	<table class="table table-bordered table-striped" id="brands_table">
        		<thead>
        			<tr>
        				<th>Brands</th>
        				<th>Description</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
        	</table>
        </div>
    </div>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

@endsection
