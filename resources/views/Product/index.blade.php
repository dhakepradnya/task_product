@extends('Product.layout')
     @section('content')

	 <div data-backdrop="static" data-keyboard="false" class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

<div class="modal-dialog">
    <div class="modal-content load_modal" style="width:100%;margin-left: -100px;"></div>
</div>
</div>
<div class="panel panel-default">
        <h3 class="panel-heading" >Product Details <div class="pull-right">
              <a onclick="create_product()" class="btn btn-success" >Add New Product</a>
            </div></h3>
       
                   
                       
                <table id="example" class="table table-striped table-bordered" width="100px;">
                        <thead>
                            <tr>
                                <th width="5px;">Sr.No</th>
                                <th width="5px;">Product Name</th>
                                <th width="5px;">Product Price</th>
                                <th width="70px;">Product Desccription</th>
                                <th width="5px;">List</th>
                                <th width="5px;"> Edit</th>
                                <th width="5px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $i=1;?>
                            @foreach ($prod as $item)
                            <tr>
                                <td>{{ $i}}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->product_price }}</td>
                                <td>{{ $item->product_desccription }}</td>
                                <td>
                                   
							<a onclick="show_img(this.id);"  id="{{$item->id}} " >
          <span class="glyphicon glyphicon-picture"></span>
        </a>	
			</a>
  <script>
			function show_img(id)
	{
		
	     var  img_id = id; 
		var base_url = {!! json_encode(url('/')) !!};
		//alert(financial_idssss)
		$.get( base_url +'/Product/show_image/'+img_id, 
		function( data ) {
            $('#myModal').modal();
            $('#myModal').on('shown.bs.modal', function(){
                $('#myModal .load_modal').html(data);
			});
            $('#myModal').on('hidden.bs.modal', function(){
                $('#myModal .modal-body').data('');
			});
		}); 
		
	}
			</script>

                                </td>
								<?php
										$p_id = $item->id;
										$encrypted_id = Crypt::encrypt($p_id);
										// dd($idd);
										?> 
                                <td> <a href="{{ url('Product/edit/'.$encrypted_id.'')}}"><i class="glyphicon glyphicon-pencil"></i></a></td>
									<td><a class='delete' data-id='{{$item->id}}' href="#"><i class="glyphicon glyphicon-trash"></i></a>
        </a></td>
                                
                            </tr>
							<?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    
    </div>
	
<script>

	function create_product()
	{
var base_url = {!! json_encode(url('/')) !!};

 
 window.location.href = base_url+'/Product/create'; 
 
		
}		



$(document).on("click", ".delete" , function(){
	
		var base_url = {!! json_encode(url('/')) !!}; 
		var delete_id = $(this).data('id');
	
		event.preventDefault(); 
		setTimeout(function () {
			swal({
				title: "Are you sure you want to delete ?",
				text: "You won't be able to revert this!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) =>{
				if (willDelete) {
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
					 url:  base_url+'/deleteproduct/'+delete_id,
   	                   type: 'get',
						success:function(data)
						{
						swal("Deleted!","Product has been deleted..!!!", "success").then( () => {
          window.location.href = base_url+'/Product/index'; 
           })		
							
						}			
					});
					}else{
					
				}
			});
 			
            
			
		},700);
	});	


</script>
    
        
@endsection