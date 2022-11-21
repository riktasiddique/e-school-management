<div class="row justify-content-center">
    <div class="col-md-6">
        {{-- If any error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>  
         @endif  
        {{-- Success --}}
        @if(Session::has('success'))
            <div class="alert alert-info">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    </div>
</div>