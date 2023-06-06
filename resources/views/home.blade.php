@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{session('api_token')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
window.addEventListener('DOMContentLoaded', function() {
    var apiToken = '{{ session('api_token') }}'; // Retrieve the token from the session

    axios.get('/api/check-token', {
    headers: {
        'Authorization': 'Bearer ' + apiToken
    }
    })
    .then(function(response) {
        // Token otentikasi valid
        console.log(response);
        axios.get('/api/data/fitur', {
            headers: {
                'Authorization': 'Bearer ' + apiToken,
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            // Handle response data
            console.log(response);
        })
        .catch(function(error) {
            // Handle error
            console.error(error);
        });
    })
    .catch(function(error) {
        // Token otentikasi tidak valid atau tidak ada
        console.error(response);
    });
});

</script>
@endsection