<div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <p class="heading lead">LOGIN
            </p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">×</span>
            </button>
          </div>

          <!--Body-->
          <div class="modal-body">
            <div class="text-center">
              <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
              <p>
                <strong><a href = "../comum/cadastro.php">Caso não seja cadastrado, clique aqui!</a></strong>
              </p>
              <p>
                <strong><a href = "../empresa/form_empre.php">Caso queira cadastrar uma empresa, clique aqui!</a></strong>
              </p>
            </div>

            <hr>

            <!-- Radio -->
            <p class="text-center">
              <strong>LOGIN</strong>
            </p>
            <div>
                <center>
                <?php include ("../inicial/login.php");?>
                </center>
            </div>
            <!-- Radio -->
          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
            
            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
          </div>
        </div>
        </div>
    </div>
