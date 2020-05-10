<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyMailModal"></button> -->

<!-- Connect Modal -->
<div class="modal fade bg-mid-trans" id="verifyMailModal" tabindex="-1" role="dialog" aria-labelledby="verifyMailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark-trans">
      <div class="modal-header">
        <h5 class="modal-title color-danger" id="verifyMailModalLabel">Confirmation de l'e-mail</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
        </button>
      </div>
      <div class="modal-body">
				<form id="verify_mail_form" action="include/user_mail_verify.php" method="GET">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope fa-fw"></i></span>
						</div>
						<input name="token" id="token" type="text" class="form-control" placeholder="Code de vérification">
						
					</div>
					<div class="form-group">
            <!-- <input type="submit" value="Login" class="btn btn-login bg-dark-trans float-right"> -->
            <a class="btn btn-login bg-dark-trans float-right" href="javascript:{}" onclick="document.getElementById('verify_mail_form').submit();">Valider</a>
					</div>
				</form>
			</div>

      <div class="modal-footer d-flex justify-content-between">
				<div class="d-flex justify-content-center links">
					Entrez votre code de vérification.
				</div>
				<!-- <div class="d-flex justify-content-center links">
					<a href="#">Mot de passe oublié ?</a>
				</div> -->
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>