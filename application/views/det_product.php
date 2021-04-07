

 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		View Order
 	</title>
 </head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="<?= base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-qeSK1YgKEW8qd-ZU"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- jQuery library -->
<script src="<?= base_url() ?>assets/jquery-3.3.1.min.js"></script>

<!-- Select2 JS -->
<script src="<?= base_url() ?>assets/select2/dist/js/select2.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			  <a class="navbar-brand" href="#">Ebunga</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Features</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Pricing</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" href="#">Disabled</a>
			      </li>
			    </ul>


			  </div>
			  <div class="float-right">
			  	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  		<i class="fas fa-shopping-bag"></i>
				</button>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Orders</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				    
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				       <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
				      </div>
				    </div>
				  </div>
				</div>
			  </div>
		</div>
</nav>


<div class="container mt-3">
	<h4>View Order</h4>
	<div class="row">
		<div class="col-sm-8">
			
				<div class="card">
				  <div class="card-header">
				    Featured
				  </div>
				  <div class="card-body">
				  	<div class="row">
				   	<div class="col-sm-4">
					<img src="<?= base_url() ?>assets/img/1.png ?>" alt="images" class="img-thumbnail">
					</div>

					<?php $cart = $this->cart->contents(); ?>
					

					<div class="col-sm-8">
						<?php foreach ($cart as $item) { ?>
						<div class="form-group">
							<label class="for">Nama product</label>
							<p><?= $item['name'] ?></p>
						</div>

						<div class="form-group">
							<label class="for">Nama penerima</label>
							<p><?= $item['nama_penerima'] ?></p>
						</div>

						<div class="form-group">
							<label class="for">Email penerima</label>
							<p><?= $item['email_penerima'] ?></p>
						</div>

						<div class="form-group">
							<label class="for">Telp penerima</label>
							<p><?= $item['telp_penerima'] ?></p>
						</div>

						<div class="form-group">
							<label class="for">Nama penerima</label>
							<p><?= $item['nama_penerima'] ?></p>
						</div>
						<div class="form-group">
							<label class="for">Alamat penerima</label>
							<p><?= $item['alamat_penerima'] ?></p>
							<p><?= $item['kel'] ?>,<?= $item['kec'] ?>,<?= $item['kab'] ?>,<?= $item['prov'] ?></p>
						</div>
						<div class="form-group">
							<label class="for">Catatan</label>
							<p><?= $item['note'] ?></p>
							
						</div>
						<div class="form-group">
							<label class="for">Tulisan papan bunga</label>
							<p><?= $item['papan_bunga'] ?></p>
							
						</div>
					</div>

				<?php } ?>


				  </div>
				</div>
				
			</div>
		</div>
		<div class="col-sm-4">
			
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			  	<?php foreach ($cart as $item2) { ?>
			   <label>Summary</label><label class="float-right">Rp.<?= $item2['price'] ?></label>
			   <hr>
			   <label>Grand Total</label><label class="float-right" style="font-size: 23px; color: orange;">Rp.<?= $item2['price'] ?></label>
			   <hr>
			<?php } ?>


	<form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
		<?php foreach ($cart as $pay) {
			
		} ?>
      <input type="hidden" name="result_type" id="result-type" value="">
      <input type="hidden" name="result_data" id="result-data" value="">

      <input type="hidden" name="name" id="name" value="<?= $pay['name'] ?>">
      <input type="hidden" name="price" id="price" value="<?= $pay['price'] ?>">
      <input type="hidden" name="nama_penerima" id="nama_penerima" value="<?= $pay['nama_penerima'] ?>">
      <input type="hidden" name="telp_penerima" id="telp_penerima" value="<?= $pay['telp_penerima'] ?>">
      <input type="hidden" name="email_penerima" id="email_penerima" value="<?= $pay['email_penerima'] ?>">
       <input type="hidden" name="alamat_penerima" id="alamat_penerima" value="<?= $item['kel'] ?>,<?= $item['kec'] ?>,<?= $item['kab'] ?>,<?= $item['prov'] ?>">
      <button id="pay-button" class="btn btn-primary btn-sm btn-lg btn-block">Checkout</button>
    </form>
			  </div>

			</div>
		</div>
	</div>
</div>

 <style type="text/css">
 	.for{
 		font-weight: bold;
 	}
 </style>
  <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      var name = $("#name").val();
      var price = $("#price").val();
      var nama_penerima = $("#nama_penerima").val();
      var alamat_penerima = $("#alamat_penerima").val();
      var email_penerima = $("#email_penerima").val();
      var telp_penerima = $("#telp_penerima").val();

    
    $.ajax({
    type : 'POST',
    url: '<?= base_url()?>snap/token',
    data :{
    	price:price,
    	name:name,
    	nama_penerima:nama_penerima,
    	alamat_penerima:alamat_penerima,
    	email_penerima:email_penerima,
    	telp_penerima:telp_penerima
    },
    cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
 </body>
 </html>