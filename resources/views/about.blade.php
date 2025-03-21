@extends('layouts.app')

@section('content')
<div class="container">
		@include('flash::message')
		<div class="row justify-content-center">
			<div class="col-10">
                <div class="card">
                    <div class="card-body">
            	
            <h2>InstaHub</h2>
            <p>{!! __('messages.aboutInstaHub') !!}</p>
            <p>{{ __('messages.targetInstaHub') }}</p>
            <p>{{ __('Read more (only in German)') }}: <a href='https://blog.wi-wissen.de/' target='_blank' >https://blog.wi-wissen.de/</a></p>
            
            <h3>Hosting</h3>
            <p>{{ __('InstaHub is hosted and develped by') }} <a href="https://wi-wissen.de/">wi-wissen.de</a></p>

            <h3>{{ __('Standing on the shoulders of giants') }}</h3>
            <p>{{ __('Many thanks and respect to') }}:</p>
            <ul>
            <li><a href='https://www.mysql.com/'>MySQL</a>
            </li>
            <li><a href='http://php.net/'>php</a>
            </li>
            <li><a href='https://laravel.com/'>Laravel</a>
            <ul>
            <li><a href='https://github.com/laracasts/flash'>laracasts/flash</a>
            <li><a href='https://github.com/orangehill/iseed'>orangehill/iseed</a></li>
            <li><a href='https://github.com/hisorange/browser-detect'>hisorange/browser-detect</a></li>
            </li>
            <li><a href='https://github.com/rap2hpoutre/laravel-log-viewer'>rap2hpoutre/laravel-log-viewer</a>
            </li>
            <li><a href='https://github.com/barryvdh/laravel-debugbar'>barryvdh/laravel-debugbar</a>
            </li>
            
            </ul>
            </li>
            <li><a href='http://bootstrap.com/'>Bootstrap 3</a>
            </li>
            <li><a href='https://jquery.com/'>jQuery</a> with <a href='https://github.com/jquery-backstretch/jquery-backstretch'>Backstretch</a>
            </li>
            <li>Photos by <a href='https://pixabay.com/'>pixabay</a> (CC0)
            </li>
            <li>Splash images by <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            <li>Face images by <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            <li>Fake Ad images based on <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            
            </ul>

            <h3>{{ __('Contributing') }}</h3>
            <p>{!! __('messages.contributing') !!}</p>

            <h3>{{ __('Contributers') }}</h3>
            <p>{!! __('messages.contributers') !!}</p>

            <h3>{{ __('License') }}</h3>
            <p><a href='https://www.mozilla.org/en-US/MPL/2.0/'>Mozilla Public License (MPL)</a></p>

            </div>
        </div>
    
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
