<div class="container">
  <?php echo (isset($pesan)) ? $pesan : ''; ?>
    <br>
    <br>
    <br>

    <div class="card o-hidden border-0 shadow-lg my-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block "> <img src="<?php echo base_url(); ?>assets/img/gedung.jpg" width="495" height="600"></div>
                <div class="col-lg-7">
                    <div class="p-5">

                        <div class="text-center"> <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>  </div>

                        <form class="user" method="POST" action="<?= base_url('Registration/do_register'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="nama lengkap" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            
                            <div class="form-group" id="unitAll">
                                <div>
                                    <select id="unit" name="Unit" class="form-control"> </select>                                  
                                      <?= form_error('unit', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button type=" submit" class="btn btn-primary btn-user btn-block"> Daftar </button>
                             
                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url() ?>auth">Sudah Punya Akun? Login Disini!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.onload = function() {
  getAllUnit();
};
 var site = '<?php echo site_url('/') ?>';
 var base = '<?php echo base_url() ?>';

function getAllUnit() {
        $.ajax({
			type: 'POST',
			url: site+'Registration/getUnit/', 
            success: function(data) {				
				$('#unit').html(data);
				// $('#unit').select('refresh');
			},
			error: function(e) {
				console.log(e.statusText);
			}
		});
}
</script>