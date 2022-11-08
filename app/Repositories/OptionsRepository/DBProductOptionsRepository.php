<?php

namespace EasyShop\Repositories\OptionsRepository;

use DB;
use EasyShop\Models\ProductOptions;
use EasyShop\Models\ProductOptionValue;

class DBProductOptionsRepository implements ProductOptionsRepositoryInterface
{

  public function find($id = null)
  {
    return ProductOptions::find($id);
  }

  public function findOptionWithValues($id)
  {
    return ProductOptions::with('values', 'products')->find($id);
  }


  public function findOptionValue($id)
  {
    return ProductOptionValue::find($id);
  }
}
