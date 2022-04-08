<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>yaman</title>
         <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body class=" bg-gray-200 text-white">
        <div class="mt-8 max-w-md w-600 lg:max-w-none mx-auto h-400 flex shadow-lg " style="width: 900px;">
            <div class="w-2/5 rounded-l-lg overflow-hidden hidden lg:block ">
                <img class="h-full" src="{{ asset('img/ruin-3746423_1920.jpg') }}">
            </div>
            <div class="w-full lg:w-3/5 px-16 bg-white rounded-r-lg">
                <div class="max-w-lg mt-12 text-gray-700 ">
                    <div class="mb-8">
                        <p class="text-2xl font-semibold ">Creat your account</p>
                        <span class="text-sm text-gray-400"> its free to join us!</span>
                    </div>
                     @if(Session::has('success'))
                        <div class="text-white bg-green-400 py-2 px-6 mb-4 rounded-lg">
                            <b >{{session::get('success')}}</b>
                        </div>
                    @endif
                    @if(Session::has('ERORR'))
                        <div class="text-white bg-red-400 py-2 px-6 mb-4 rounded-lg ">
                            <b >{{session::get('ERORR')}}</b>
                        </div>
                    @endif
                    <form class="mb-12" method="POST" action="{{ route('user.create') }}">
                        @csrf
                        <div class="mb-2">
                             <p class="text-sm text-gray-600 font-semibold mb-2">What should we call you?</p>
                             <div class="relative">
                                <input type="text" value="{{ old('name') }}" autofocus=""  name="name" placeholder="Enter your name" class=" w-full py-2 px-10 bg-gray-200 rounded-lg">
                                 <i class="fa fa-user absolute left-0 top-0 ml-3 mt-3"></i>
                                 @error('name')
                                    <small class=" text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                             </div>
                        </div>
                        <div class="mb-2">
                             <p class="text-sm text-gray-600 font-semibold mb-2">Whats you email?</p>
                            <div class="relative">
                                
                                <input type="email" value="{{ old('email') }}" name="email" placeholder="Enter your email" class=" w-full py-2 px-10 bg-gray-200 rounded-lg">
                                 <i class="fa fa-envelope absolute left-0 top-0 ml-3 mt-3"></i>
                                  @error('email')
                                    <small class=" text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                             </div>
                        </div>
                        <div class="mb-2">
                            <p class="text-sm text-gray-600 font-semibold mb-2">Creat a password</p>
                              <div class="relative">
                                <input type="password" value="{{ old('password') }}" name="password" placeholder="Enter your password" class=" w-full py-2 px-10 bg-gray-200 rounded-lg">
                                 <i class="fa fa-lock absolute left-0 top-0 ml-3 mt-3"></i>
                                 @error('password')
                                    <small class=" text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                             </div> 
                        </div>
                        <div class="mb-6">
                             <p class="text-sm text-gray-600 font-semibold mb-2">confirm your password</p>
                            <div class="relative">
                                <input type="password" value="{{ old('cpassword') }}" name="cpassword" placeholder="ReEnter your password" class=" w-full py-2 px-10 bg-gray-200 rounded-lg">
                                 <i class="fa fa-envelope absolute left-0 top-0 ml-3 mt-3"></i>
                                  @error('cpassword')
                                    <small class=" text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                             </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-6 bg-gray-700 text-white rounded-lg hover:bg-gray-500 mb-6">Sign up</button>
                        <a href="{{ route('user.login') }}" 
                        class="hover:text-gray-400">i have an account already!</a>
                    </form>
                </div>
            </div>
        </div>
            
    </body>
</html>
