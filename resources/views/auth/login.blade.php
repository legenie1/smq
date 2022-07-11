 @extends('layouts.auth')
 @section('content')
     <div class="container">
         <input type="checkbox" id="flip">
         <div class="cover">
             <div class="front">
                 <img src="{{ URL::to('assets/images/frontImg.jpg') }}" alt="">
                 <div class="text">
                     <span class="text-1">Bienvenue sur la plateforme <br>SQM-NSIA</span>
                     <span class="text-2">Prêt à démarrer</span>
                 </div>
             </div>
             <div class="back">
                 <img class="backImg" src="{{ URL::to('assets/images/backImg.jpg') }}" alt="">
                 <div class="text">
                     <span class="text-1">Complete miles of journey <br> with one step</span>
                     <span class="text-2">Prêt à démarrer</span>
                 </div>
             </div>
         </div>
         <div class="forms">
             {!! Toastr::message() !!}
             <div class="form-content">
                 @if (session()->has('error'))
                     <div class="text-danger text-center text-bold">
                         {{ session()->get('error') }}
                     </div>
                 @endif
                 <div class="login-form">
                     <div class="title">Connexion</div>
                     <form method="POST" action="{{ route('login') }}">
                         @csrf
                         <div class="input-boxes">
                             <div class="input-box">
                                 <i class="fas fa-envelope"></i>
                                 <input type="text" placeholder="Entrer votre email"
                                     class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                     required>
                             </div>
                             <div class="input-box">
                                 <i class="fas fa-lock"></i>
                                 <input type="password" placeholder="Entrer votre mot de passe"
                                     class="@error('password') is-invalid @enderror" name="password"
                                     value="{{ old('password') }}" required>
                             </div>
                             <div class="text"><a href="{{ route('forget-password') }}">Mot de passe oublié?</a>
                             </div>
                             <div class="button input-box">
                                 <input type="submit" value="Connexion">
                             </div>
                             <div class="text sign-up-text">Je n'ai pas de compte? <label for="flip">M'inscrire</label>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="signup-form">
                     <div class="title">Inscription</div>
                     <form method="POST" action="{{ route('register') }}">
                         @csrf
                         <div class="input-boxes">
                             <div class="input-box">
                                 <i class="fas fa-user"></i>
                                 <input type="text" class="@error('name') is-invalid @enderror" name="name"
                                     value="{{ old('name') }}" placeholder="Entrer votre nom" required>
                             </div>
                             <input type="hidden" class="image" name="image" value="1973366182.png">
                             <div class="input-box">
                                 <i class="fas fa-envelope"></i>
                                 <input type="text" class="@error('email') is-invalid @enderror" autocomplete="off" autocomplete="no" name="email"
                                     value="{{ old('email') }}" placeholder="Entrer votre email" required>
                             </div>
                             <div class="input-box">
                                 <i class="fas fa-envelope"></i>
                                 <input type="number"
                                     class="form-control form-control-lg @error('phone_number') is-invalid @enderror"
                                     name="phone_number" value="{{ old('phone_number') }}"
                                     placeholder="Ex: 690 65 35 06" required>
                             </div>
                             <div class="input-box">
                                 <i class="fas fa-lock"></i>
                                 <input type="password" placeholder="Entrer votre mot de passe"
                                     class="@error('password') is-invalid @enderror" name="password"
                                     value="{{ old('password') }}" required>
                             </div>
                             <div class="button input-box">
                                 <input type="submit" value="Inscription">
                             </div>
                             <div class="text sign-up-text">Je possède un compte? <label for="flip">Me conncter</label>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection
