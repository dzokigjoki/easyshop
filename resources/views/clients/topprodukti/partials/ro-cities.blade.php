<?php

$oldCity = '';

if (old('city_other')) {
    $oldCity = old('city_other');
} else if (isset($formData) && isset($formData['city_other'])) {
    $oldCity = $formData['city_other'];
}

?>

<?php
    $cities = [
        "Alba",
        "Arad",
        "Arges",
        "Bacau",
        "Bihor",
        "Bistrita-Nasaud",
        "Botosani",
        "Braila",
        "Brasov",
        "Bucuresti",
        "Buzau",
        "Calarasi",
        "Caras-Severin",
        "Cluj",
        "Constanta",
        "Covasna",
        "Dambovita",
        "Dolj",
        "Galati",
        "Giurgiu",
        "Gorj",
        "Harghita",
        "Hunedoara",
        "Ialomita",
        "Iasi",
        "Ilfov",
        "Maramures",
        "Mehedinti",
        "Mures",
        "Neamt",
        "Olt",
        "Prahova",
        "Salaj",
        "Satu Mare",
        "Sibiu",
        "Suceava",
        "Teleorman",
        "Timis",
        "Tulcea",
        "Valcea",
        "Vaslui",
        "Vrancea",
    ];


    asort($cities);

?>

<option value="">--- Alege ---</option>
@foreach($cities as $city)
    <option value="{{ $city  }}" @if($oldCity === $city) selected="selected" @endif>{{$city}}</option>
@endforeach


      