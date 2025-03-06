            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('alert'))
                <div class="alert alert-success w-50">
                    {{ session('alert') }}
                </div>
            @endif
