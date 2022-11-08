<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;
use URL;

class Document extends Model
{
    // Types of documents
    const TYPE_NARACHKA = 'narachka';
    const TYPE_PRIEMNICA = 'priemnica';
    const TYPE_ISPRATNICA = 'ispratnica';
    const TYPE_REZERVACIJA = 'rezervacija';
    const TYPE_IZLEZ = 'izlez';
    const TYPE_VLEZ = 'vlez';
    const TYPE_PROFAKTURA = 'profaktura';
    const TYPE_FAKTURA = 'faktura';
    const TYPE_FAKTURA_ONLINE = 'faktura_online';
    const TYPE_POVRATNICA = 'povratnica';
    const TYPE_POVRATNICA_DOBAVUVAC = 'povratnica_dobavuvac';

    const PAYMENT_KARTICKA = 'karticka';
    const PAYMENT_KARTICKA_RATI = 'rati';
    const PAYMENT_GOTOVO = 'gotovo';
    const PAYMENT_ZIRO = 'ziro';

    const DISCOUNT_FIXED = 'fixed';
    const DISCOUNT_PERCENTAGE = 'percentage';

    const STATUS_NARACKA_GENERIRANA = 'generirana';
    const STATUS_GENERIRANA = 'generirana';
    const STATUS_ISPRATENA = 'ispratena';
    const STATUS_DOSTAVENA = 'dostavena';
    const STATUS_VRATENA = 'vratena';
    const STATUS_REKLAMACIJA = 'reklamacija';

    const PAID_TRUE = 'platena';
    const PAID_FALSE = 'neplatena';

    /**
     * @var string
     */
    protected $table = 'documents';

    /**
     * @var bool
     */
    public $timestamps = true;

    public static function transliterate($textcyr = null, $textlat = null) {
        $cyr = array(
        'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
        'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        $lat = array(
        'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
        'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q');
        if($textcyr) return str_replace($cyr, $lat, $textcyr);
        else if($textlat) return str_replace($lat, $cyr, $textlat);
        else return null;
    }

    /**
     * Get document items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items() {
        return $this->hasMany(DocumentItems::class, 'document_id');
    }
}
