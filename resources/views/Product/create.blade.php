@extends('Product.layout')
  
@section('content')
<div class="panel panel-default">

   

	<h3 class="panel-heading" >Add New Product </h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form name="form1" action="{{route('Product/insert')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prodect Name:</strong>
                <input type="text" name="p_name" class="form-control" placeholder="Enter Prodect Name" onBlur="return validate();" autocomplete="off">
				<div class="pd" id="presname"></div>
            </div>
        </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="text" name="p_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" onBlur="return validate1();" onKeyUp="if(/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
				<div class="pd" id="prespri"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                <textarea class="form-control" rows="4" cols="50" ffstyle="height:150px" name="p_description" placeholder="Enter Product Description"autocomplete="off" onBlur="return validate2();"></textarea>
				<div class="pd" id="predesc"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="files[]"  multiple  class="form-control" >
				 @if ($errors->has('files'))
            @foreach ($errors->get('files') as $error)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $error }}</strong>
            </span>
            @endforeach
          @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		 <a class="btn btn-primary" href="{{ route('Product/index') }}"> Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
     
</form>
<style type="text/css">
	.pd
	{
		color:#FF0000;
		font-size:15px;
		margin-left:5px;
	}
	.red
	{
		color:#FF0000;
	}
	
</style>
<script>
function validate()  
		{  

			var product_name = document.form1.p_name; 
			var val = product_name.value; 

			if((product_name.value==null)||(product_name.value==""))
			{
				document.getElementById("presname").innerHTML = "Please Enter Product Name";
				product_name.focus();
				return false
			}
			
			else
			{
				document.getElementById("presname").innerHTML ="";
				return false;
			}
		}
		
		
function validate1()  
		{  

			var product_price = document.form1.p_price; 
			var val = product_price.value; 

			if((product_price.value==null)||(product_price.value==""))
			{
				document.getElementById("prespri").innerHTML = "Please Enter Product Price";
				product_price.focus();
				return false
			}
			
			else
			{
				document.getElementById("prespri").innerHTML ="";
				return false;
			}
		}	

function validate2()  
		{  

			var product_description = document.form1.p_description; 
			var val = product_description.value; 

			if((product_description.value==null)||(product_description.value==""))
			{
				document.getElementById("predesc").innerHTML = "Please Enter Product Description";
				product_description.focus();
				return false
			}
			
			else
			{
				document.getElementById("predesc").innerHTML ="";
				return false;
			}
		}			
</script>
  </div>
@endsection