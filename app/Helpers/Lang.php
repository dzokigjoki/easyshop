<?php


function getActiveLanguages()
{

  // if (!\Cache::has('easycms.languages')) {
  $languages = config( 'clients.' . config( 'app.client') . '.languages');

  if(is_null($languages)){
    $languages["lang1"] = [

            'active' => true,

            'locale' => 'mk',

            'url_segment' => '',

            'name' => 'Македонски'

    ];
    
  }
  $activeLanguages = array_filter($languages, function ($item) {
    return $item['active'] === true;
  });

  // \Cache::put('easycms.languages', $activeLanguages, 60 * 24);
  // } else {
  // $activeLanguages =  \Cache::get('easycms.languages');
  // }

  return $activeLanguages;
}

/**
 * Function that returns current locale based on the first segment
 *
 * @returns string (mk, en ...)
 */
function detectLocale($segment = null)
{

  $segment = null === $segment ? request()->segment(1) : $segment;

  $activeLanguages = getActiveLanguages();

  foreach ($activeLanguages as $key => $language) {
    if ($language['locale'] === $segment) {
      return $language['locale'];
    }
  }


  $value = reset($activeLanguages);

  return $value['locale'];
}


/**
 * Function that returns current lang based on the first segment
 *
 * @returns string (lang1, lang2)
 */
function detectLang($segment = null)
{

  $locale = detectLocale($segment);
  $activeLanguages = getActiveLanguages();
  $lang = null;

  foreach ($activeLanguages as $key => $value) {
    if ($value['locale'] === $locale) {
      return $key;
    }
  }

  reset($activeLanguages);
  return key($activeLanguages);
}

/**
 * Function that returns current locale based on the first segment
 *
 * @returns string
 */
function detectUrlLang($segment = null)
{
  $locale = detectLocale($segment);
  $activeLanguages = getActiveLanguages();
  $urlSegment = '';

  foreach ($activeLanguages as $key => $value) {
    if ($value['locale'] === $locale) {
      return ($value['url_segment'] == "") ? "/" : ("/" . $value['url_segment'] . "/");
    }
  }

  $value = reset($activeLanguages);
  return ($value['url_segment'] == "") ? "/" : ("/" . $value['url_segment'] . "/");
}

//da se napravi funkcija sto prima ruta i ja vrakja so tocen prefiks vo zavisnost od locale

