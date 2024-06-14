<?php

class NoweAuto {
    protected $model;
    protected $cenaEuro;
    protected $kursEuro;

    public function __construct($model, $cenaEuro, $kursEuro) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuro = $kursEuro;
    }

    public function obliczCene() {
        return $this->cenaEuro * $this->kursEuro;
    }
}

class AutoZDodatkami extends NoweAuto {
    protected $alarm;
    protected $radio;
    protected $klimatyzacja;

    public function __construct($model, $cenaEuro, $kursEuro, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cenaEuro, $kursEuro);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function obliczCene() {
        $cenaPodstawowa = parent::obliczCene();
        return $cenaPodstawowa + $this->alarm + $this->radio + $this->klimatyzacja;
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    protected $procentUbezpieczenia;
    protected $liczbaLat;

    public function __construct($model, $cenaEuro, $kursEuro, $alarm, $radio, $klimatyzacja, $procentUbezpieczenia, $liczbaLat) {
        parent::__construct($model, $cenaEuro, $kursEuro, $alarm, $radio, $klimatyzacja);
        $this->procentUbezpieczenia = $procentUbezpieczenia;
        $this->liczbaLat = $liczbaLat;
    }

    public function obliczCene() {
        $cenaPodstawowa = parent::obliczCene();
        $cenaPoRabacie = $cenaPodstawowa * ((100 - $this->liczbaLat) / 100);
        return $cenaPoRabacie * $this->procentUbezpieczenia;
    }
}