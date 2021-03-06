<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connectModal"></button> -->
<script type="text/javascript">
$(function(){
	$("#login").click(function(e){
        // include/user_logout.php
        e.preventDefault(); 

        $.post("include/user_connect.php", $("#connect_form").serialize(), function(data){
                alert(data);
                location.reload();
            }

        );
        return false;
    });

});

</script>


<!-- Connect Modal -->
<div class="modal fade bg-mid-trans" id="connectModal" tabindex="-1" role="dialog" aria-labelledby="connectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark-trans">
      <div class="modal-header">
        <h5 class="modal-title color-danger" id="connectModalLabel">Connexion</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
        </button>
      </div>
      <div class="modal-body">
				<form id="connect_form" action="include/user_connect.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="user_pseudo" id="user_pseudo" type="text" class="form-control" placeholder="Nom d'utilisateur">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="user_password" id="user_password" type="password" class="form-control" placeholder="Mot de passe">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox"><span><p>Se souvenir de moi<p></span>
					</div>
					<div class="form-group">
            <!-- <input type="submit" value="Login" class="btn btn-login bg-dark-trans float-right"> -->
            <!-- <a class="btn btn-login bg-dark-trans float-right" href="javascript:{}" onclick="document.getElementById('connect_form').submit();">Connexion</a> -->
            <a class="btn btn-login bg-dark-trans float-right" id="login" href="">Connexion</a>
					</div>
				</form>
			</div>

      <div class="modal-footer d-flex justify-content-between">
				<div class="d-flex justify-content-center links">
					Pas encore de compte ?&nbsp;<a  href="" data-toggle="modal" data-target="#registerModal">Inscrivez-vous !</a>
				</div>
				<div class="d-flex justify-content-center links">
					<a href="#">Mot de passe oublié ?</a>
				</div>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>