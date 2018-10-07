	<div class="modal-content mr-0">
		<div class="modal-body">
			<?php echo form_open('',array('id'=>'cart-form-update')); ?>
			<h1>Cart</h1>
			<?php if (count($this->cart->contents()) > 0): ?>
				<table class="table table-striped table-inverse table-hover table-bordered">
					<thead>
						<tr>
							<th width="1"></th>
							<th width="3">Jumlah</th>
							<th>Name</th>
							<th>Size</th>
							<th class="text-right">Harga</th>
							<th class="text-right">Sub-Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($this->cart->contents() as $items): ?>

							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
							<?php echo form_hidden($i.'[max]', $items['max']); ?>	
							<tr>
								<td>
									<a href="#" onclick="remove_cart('<?php echo $items['rowid'] ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
								</td>
								<td>
									<div class="input-group">
										<input type="number" name="<?php echo $i.'[qty]' ?>" id="cart-form-update-qty" class="form-control form-control-sm" value="<?php echo $items['qty'] ?>" min="0" max="<?php echo $items['max'] ?>">
									</div>

								</td>
								<td><?php echo $items['name']; ?></td>
								<td><?php echo $items['size'] ?></td>
								<td class="text-right"><?php echo $this->cart->format_number($items['price']); ?></td>
								<td class="text-right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
							</tr>

							<?php $i++; ?>

						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"> </td>
							<td class="text-right"><strong>Total</strong></td>
							<td class="text-right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
						</tr>
					</tfoot>
				</table>

				<?php if ($this->session->userdata('id') != null): ?>
					<p>
					<a href="#" onclick="checkout();" class="btn btn-primary float-right"><i class="fa fa-cart-arrow-down"></i> Checkout</a>
				</p>
				<?php else: ?>
					<p>
						<a href="#" onclick="login()" class="btn btn-success float-right">Please Log In</a>
					</p>
				<?php endif ?>
				<?php else: ?>
					<div class="alert alert-warning">
						Cart is Empty
					</div>
				<?php endif ?>

			</div>
		</div>
		<script>
			$("#cart-form-update").submit((e) => {
				e.preventDefault();
			});
			$("#cart-form-update-qty").change(() => {
				$.ajax({
					url: "<?php echo base_url('Cart/update') ?>",
					type: "POST",
					data: $('#cart-form-update').serialize(),
					success: (data) =>
					{
						show_cart();
					}
				});
			});		
			var remove_cart = (id) => {
				$.ajax({
					url: "<?php echo base_url('Cart/remove/') ?>"+id,
					data: null,
					success: function(data)
					{
						show_cart();
						swal("Cart removed", "Thanks You", "success");
					}
				});
			};
			var checkout = (id) => {
				$.ajax({
					url: "<?= base_url('User/Transaction/orders') ?>",
					data: null,
					success: function(data)
					{
						if(data=='success'){
							swal("Your Order is placed", "Thanks You", "success");
						}else{
							swal("Error", "Cart is empty", "error");
						}
						$('#cart-modal').modal('hide');
					}
				});
			};
		</script>