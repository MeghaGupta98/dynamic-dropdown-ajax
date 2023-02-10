<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>

<body>
    <div class="form-group mb-3">

        <select id="country-dropdown" class="form-control">
            <option value="">-- Select Country --</option>
            @foreach ($country as $countrylist)
            <option id="country-dropdown" value="{{$countrylist->id}}">
                {{$countrylist->country_name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <select id="state-dropdown" class="form-control">
        </select>
    </div>
    <div class="form-group">
        <select id="city-dropdown" class="form-control">
        </select>
    </div>
    <!-- <a href="{{route('fetch.city')}}">ok</a> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            var Country_id = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "/fetchState",
                type: "POST",
                data: {
                    country_id: Country_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    var state = $('#state-dropdown').html('<option value="">-- Select State --</option>');
                    $.each(result.state, function(key, value) { 
                        $("#state-dropdown").append('<option value="' + value.id +'">' + value.state_name + '</option>');
                    });
                }
            });
        });
        $('#state-dropdown').on('change', function () {
            var stateId =this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url: "/fetchCities",
                type: "POST",
                data: {
                    state_id: stateId,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data.city);
                    var city = $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    $.each(data.city, function(key, value) { 
                        $("#city-dropdown").append('<option value="' + value.id +'">' + value.city_name + '</option>');
                    });
                }
            });
        });
    });
    </script>
</body>

</html>