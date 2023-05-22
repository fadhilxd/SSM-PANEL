<script>
(function() {
    var _show = function( element, field ) {
        this.element = element;
        this.field = field;
        this.toggle();    
    };
    _show.prototype = {
        toggle: function() {
            var self = this;
            self.element.addEventListener( "change", function() {
                if( self.element.checked ) {
                    self.field.setAttribute( "type", "text" );
                } else {
                    self.field.setAttribute( "type", "password" );    
                }
            }, false);
        }
    };
    
    document.addEventListener( "DOMContentLoaded", function() {
        var checkbox = document.querySelector( "#show-pass" ),
            pass = document.querySelector( "#pass" ),
            _form = document.querySelector( "form" );
            var toggler = new _show( checkbox, pass );
    });
})();
</script>
           
           <div class="mb-0"></div><div class="row">
    <div class="offset-md-2 col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                <h4 class="header-title">Login</h4>
                <hr>
                                <?php 
										if ($msg_type == "error") {
										?>
										<div class="alert bg-danger text-white">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class=""></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
                                <form class="form-horizontal" method="POST">
                                								<div class="form-group">
												<label>Nama Pengguna</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-user text-primary"></i>
                                                    </div>
                                                </div>
													<input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required>
												</div>
											</div>
                    <div class="form-group">
												<label>Kata Sandi</label>
											    <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                        <i class="fa fa-lock text-primary"></i>
                                                    </div>
                                                </div>
													<input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required>
												</div>
											</div> 
                    <div class="form-group">
											    <div class="custom-control custom-checkbox">
											    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
											        <label class="custom-control-label" for="agree">
											        Remember Me
											        </label>
											    </div>
                    <div class="form-group text-right">
                        <button type="submit" name="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                        <button type="submit" name="login" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
                <div class="form-group m-t-10 mb-0 row">
						<div class="col-sm-7 m-t-20">
							<a href="?<?php echo md5("page"); ?>=<?php echo base64_encode("kontak"); ?>" class="text-muted"><i class="fa fa-lock"></i><small>     Lupa Password Anda ? </small></a>
						</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->   
                
			</div>

            </div> <!-- end container -->
        </div> <!-- end wrapper -->

          