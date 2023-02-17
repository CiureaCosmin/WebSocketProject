<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laravel EventStream</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        <div class="flex flex-wrap">
            <div class="w-full md:w-2/2 xl:w-3/3 p-3">
                <div class="bg-white border rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-500">Latest trade</h5>
                            <h3 class="font-bold text-3xl">
                                <p>
                                    Name: <span id="latest_trade_user"></span>
                                </p>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="myForm" method="post" action="{{route('new-trade')}}">
    @csrf
    <input type="text" name="message"  value="da">
    <button type="submit">Submit</button>
</form>
</body>


<script type="module">
window.addEventListener('load', (event) => {
    console.log('page is fully loaded');
});
  Echo.channel('trades')
    .listen('NewTrade', (e) => {
       console.log(e.trade);
     ;
        document.getElementById('latest_trade_user').innerText = e.trade;
    })
</script>

<script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault(); // prevent default form submission
            var formData = $(this).serialize(); // gather form data
            $.ajax({
                url: $(this).attr('action'), // the form action URL
                type: $(this).attr('method'), // the form method (POST or GET)
                data: formData, // the form data
                success: function(data) {
                    // handle success response
                },
                error: function(xhr, status, error) {
                    // handle error response
                }
            });
        });
    });
</script>

</html>
