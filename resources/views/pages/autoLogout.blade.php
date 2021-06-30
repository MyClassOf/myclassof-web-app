@extends('templates.mainTemplate')

@section('style')
    
@endsection

@section('content')
<!-- used inline styling because the page isn't very involved -->
    <div style="height: 400px; text-align: center;">
        <h1 style="margin-top: 10%;">Logging Out...</h1>
    </div>
    
@endsection

@section('script')
    <script>
        document.getElementById("logout-button").click();
    </script>
@endsection
