<?php
namespace EasyShop\Repositories\OptionsRepository;

interface ProductOptionsRepositoryInterface
{

  public function find($id = null);


  public function findOptionWithValues($id);


  public function findOptionValue($id);
    
}
