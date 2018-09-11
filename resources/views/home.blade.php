@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Aktuelne Licitacije

                </div>
                <div class="card-body text-lg-center">
                    @foreach($licitacije as $licitacija)
                      <p><img src="{{$licitacija->src}}" alt="{{$licitacija->alt}}"/> </p>
                    <p>{{$licitacija->naziv}}</p>
                    <p>Ime poslednjeg korisnika koji je licitirao:{{$licitacija->name}}</p>
                    <p>Pocetna cena:{{$licitacija->pocetnaCena}}</p>
                    <form method="post" action="{{route('licitiraj',['id'=>$licitacija->id,'idCene'=>$licitacija->cena_id])}}">
                        {{csrf_field()}}
                    <p><input type="text" name="aukcija" placeholder="Zadnja cena:{{$licitacija->krajnjaCena}}"></p>

                        <!-- Display the c$ountdown timer in an element -->

                        <p id="brojac{{$i=$licitacija->id}}" name="brojac" ></p>

                        <script type="text/javascript">
          //pvde samo doterati da isppisuje preostalo vreme za svaki artikl ponaosob


                            // Update the count down every 1 second
                            var x = setInterval(function() {
                                var countDownDate = new Date("{{$licitacija->krajnje_vreme}}").getTime();
                                // Get todays date and time
                                var now = new Date().getTime();

                                // Find the distance between now and the count down date
                                var distance = countDownDate - now;

                                // Time calculations for days, hours, minutes and seconds
                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                // Display the result in the element with id="demo"
                                document.getElementById("brojac{{$i}}").innerHTML =" Licitacija istice za :"+ days + "d " + hours + "h "
                                    + minutes + "m " + seconds + "s ";

                                // If the count down is finished, write some text

                                // If the count down is finished, write some text
                                if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("brojac{{$i}}").innerHTML = "EXPIRED";
                                }
                            }, 1000);

                        </script>

                        <button type="submit" class="btn-primary">Licitiraj</button>
                    </form><br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
