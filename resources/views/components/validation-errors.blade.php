            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none"> <i class="fa fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            @if (session('alert'))
                <div class="alert alert-success w-50 d-flex justify-content-center me-5">
                    {{ session('alert') }}
                </div>
            @endif
