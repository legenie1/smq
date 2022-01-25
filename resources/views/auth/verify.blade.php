<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifier votre addresse mail</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('Nous vous avons envoyer un lien de réinitialisation par email.') }}
                       </div>
                   @endif
                   <a href="{{ url('/reset-password/'.$token) }}">Cliquer ici</a>
               </div>
           </div>
       </div>
   </div>
</div>
