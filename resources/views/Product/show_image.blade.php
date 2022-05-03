 <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body> 
<div class="modal-header">
    <h4 class="text-blue h4">Show Image</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%;height:100%;">
    <!-- Indicators -->
    

    <!-- Wrapper for slides -->
	
    <div class="carousel-inner" style="width:100%">
         
     
  @foreach ($product_ima as $item)
      <div class="item ">
        <img src="{{ asset('image/' . $item) }}" alt="Responsive image" style="width:100%;">
		  
      </div>
@endforeach
      
  <div class="carousel-caption">
          <h3>{{$product_name}}</h3>
          
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
<script>
  $(document).ready(function () {
    $('#myCarousel').find('.item').first().addClass('active');
  });
</script>
</body>
</html>
											

	

