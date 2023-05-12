 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Seu email foi enviado com sucesso</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!--<div class="modal-body">
                    <h2></h2>
                </div>-->
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
             </div>
         </div>
     </div>
 </div>
 <style>
     .modal {
         padding-top: 250px;
     }

     .modal-body h2 {
         font-size: 23px !important;
         color: #007095 !important;
     }

     .btn-secondary {
         background-color: #007095 !important;
     }

 </style>
 <?php
        if (isset($_POST['BTEnvia'])) {

          //Variaveis de POST, Alterar somente se necessário
          //====================================================
          $nome =        $_POST['nome']; 
          $email =          $_POST['email'];
          $wpp =      $_POST['wpp']; 
          $mensagem =      $_POST['texto'];  
          //====================================================

          //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
          //====================================================
          $email_remetente = "contato@aragaoearaujoadv.com"; // deve ser uma conta de email do seu dominio
          //====================================================

          //Configurações do email, ajustar conforme necessidade
          //====================================================
          //$email_destinatario = "italofranklin2@gmail.com"; // pode ser qualquer email que receberá as mensagens
$email_destinatario = "raraujonetoadv@gmail.com";		  
          $email_reply = "$email";
          $email_assunto = "Site Aragão e Araújo"; // Este será o assunto da mensagem
          //====================================================

          //Monta o Corpo da Mensagem 
          //====================================================
          $email_conteudo = "Nome : $nome \n";
          $email_conteudo .= "E-mail : $email \n";
          $email_conteudo .= "WhastApp : $wpp \n";
          $email_conteudo .= "Mensagem : $mensagem \n";
          //====================================================

          //Seta os Headers (Alterar somente caso necessario)
          //====================================================
          $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
          //====================================================

          //Enviando o email
          //====================================================
            if(empty($email)){
                echo "<script>alert'Preencha o campo E-mail'</script>";
            }
          if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ ?>
 <script>
     $(document).ready(function() {
         $('#exampleModal').modal('toggle');
     })

 </script>
 <?php }
          else{
            echo "</b>Falha no envio do E-Mail!</b>"; }
            //====================================================
          }
          ?>
