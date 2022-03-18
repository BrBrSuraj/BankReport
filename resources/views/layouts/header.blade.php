 <header class="header  mb-4" style="background-color:hsl(0, 0%, 93%);">
     <div class="container-fluid">
         <button class="header-toggler px-md-0 me-md-3" type="button"
             onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                 viewBox="0 0 16 16">
                 <path fill-rule="evenodd"
                     d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
             </svg>
         </button>

         @if (Route::current()->getName() !== 'loanreport')
             <div class="" style="margin-right:25%; margin-left:-600px;">

                 @foreach (config('app.available_locale') as $locale)
                     <div class="p-1 float-right">

                         <a href="{{ request()->url() }}?language={{ $locale }}"
                             class="p-1 @if (app()->getLocale() == $locale) border-buttom @endif">
                             {{ strtoupper($locale) }}
                         </a>
                     </div>
                 @endforeach
             </div>
         @else
             <div class="" style="margin-right:25%; margin-left:-200px;margin-top:15px;">

                 <div class="">
                     <p class="">{{ __('lang.languageNotAvailable') }} {{ url()->current(); }} <a class="text-danger text-lg" href="{{ route('report') }}"><span><i class="bi bi-backspace"></i></span></a></p>
                 </div>

             </div>
         @endif


         <div>
             <a href="{{ route('userprofile', auth()->user()->id, app()->getLocale()) }}">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-person-circle" viewBox="0 0 16 16">
                     <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                     <path fill-rule="evenodd"
                         d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                 </svg>
                 {{ auth()->user()->name }}
             </a>



         </div>

     </div>

 </header>
