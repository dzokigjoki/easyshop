<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php
    $excel_columns = config( 'clients.' . config( 'app.client') . '.order.excel_columns');
    ?>
    <?php $i = 1; ?>
    <table>
        <tr>
            @foreach ($excel_columns as $ec)
                <th>{{ $ec }}</th>
            @endforeach
        </tr>

        <?php foreach ($docs as $doc) {
			$doc_json 		   = json_decode($doc->document_json);
			$doc_json_columns  = ['first_name', "phone", "email", 'zip_other_shipping', 'city_id', 'country_id', 'address', 'name'];
			$quantity = 0;
		?>

        <tr>
            @foreach ($excel_columns as $key => $ec)
                @if ($key == 'no')
                    <td>{{ $i }}</td>
                @elseif(in_array($key,$doc_json_columns))
                    @if ($key == 'first_name')
                        <td>{{ isset($doc->document_number) ? $doc->document_number : '' }} -
                            {{ isset($doc_json->userShipping->first_name) ? removeChar($doc_json->userShipping->first_name) : (isset($doc_json->userBilling->first_name) ? removeChar($doc_json->userBilling->first_name) : '') }}
                            {{ isset($doc_json->userShipping->last_name) ? removeChar($doc_json->userShipping->last_name) : (isset($doc_json->userBilling->last_name) ? removeChar($doc_json->userBilling->last_name) : '') }}
                        </td>

                    @elseif($key == 'name')
                        <td>{{ isset($doc_json->userShipping->first_name) ? removeChar($doc_json->userShipping->first_name) : (isset($doc_json->userBilling->first_name) ? removeChar($doc_json->userBilling->first_name) : '') }}
                            {{ isset($doc_json->userShipping->last_name) ? removeChar($doc_json->userShipping->last_name) : (isset($doc_json->userBilling->last_name) ? removeChar($doc_json->userBilling->last_name) : '') }}
                        </td>

                    @elseif($key == 'address')
                        <td>{{ isset($doc_json->userShipping->address_shiping) ? removeChar($doc_json->userShipping->address_shiping) : (isset($doc_json->userBilling->address) ? removeChar($doc_json->userBilling->address) : '') }}
                        </td>
                    @elseif($key == 'phone')
                        <td>{{ isset($doc_json->userShipping->phone) ? $doc_json->userShipping->phone : (isset($doc_json->userBilling->phone) ? $doc_json->userBilling->phone : '') }}
                        </td>
                    @elseif($key == 'zip_other_shipping')
                        <td>{{ $doc_json->userShipping->zip_other_shipping }}</td>
                    @elseif($key == 'city_id')
                        @if ($doc_json->userShipping->city_id_shipping != 35)
                            @if ($doc_json->userShipping->country_id_shipping == 1)
                                <td>
                                    @if(isset($doc_json->userShipping->city_id_shipping) && $doc_json->userShipping->city_id_shipping != null && $doc_json->userShipping->city_id_shipping != '')
                                    {{$cities[$doc_json->userShipping->city_id_shipping - 1]['city_name']}}
                                    @else
                                    {{$cities[$doc_json->userBilling->city_id - 1]['city_name'] }}
                                    @endif
                                </td>
                            @elseif($doc_json->userShipping->country_id_shipping == null || $doc_json->userShipping->country_id_shipping == '')
                            <td>
                                @if(isset($doc_json->userShipping->city_id_shipping) && $doc_json->userShipping->city_id_shipping != null && $doc_json->userShipping->city_id_shipping != '')
                                {{$cities[$doc_json->userShipping->city_id_shipping - 1]['city_name']}}
                                @else
                                {{$cities[$doc_json->userBilling->city_id - 1]['city_name'] }}
                                @endif
                            </td>
                            @else
                                <td>{{ $doc_json->userShipping->city_other_shipping }} </td>
                            @endif
                        @else
                            <td>{{ $doc_json->userShipping->city_other_shipping }} </td>
                        @endif
                    @elseif($key == 'country_id')
                        <td>{{ isset($doc_json->userShipping->country_id_shipping) ? $countries[$doc_json->userShipping->country_id_shipping - 1]['country_name'] : '' }}
                        </td>
                    @else
                        <td>{{ isset($doc_json->userShipping->$key) ? $doc_json->userShipping->$key : (isset($doc_json->userBilling->$key) ? $doc_json->userBilling->$key : '') }}
                        </td>
                    @endif
                @elseif(config( 'app.client') === 'dobra_voda' && $key == 'municipality')
                    <td>{{ isset($doc_json->userShipping->municipality) ? removeChar($doc_json->userShipping->municipality) : (isset($doc_json->userBilling->municipality) ? removeChar($doc_json->userBilling->municipality) : '') }}
                    </td>
                @elseif($key == 'products')
                    <?php
                    $doc_temp = [];
                    if (isset($doc_items[$doc->id])) {
                        foreach ($doc_items[$doc->id] as $di) {
                            $unit_code_config = \EasyShop\Models\AdminSettings::getField('sifra');
                            if (!empty($unit_code_config)) {
                                $temp_doc = $di->unit_code . ' - ' . $di->item_name;
                            } else {
                                $temp_doc = $di->item_name;
                            }
                            
                            if(isset($di->variation_id)){
                                $variation_ids = explode(",", $di->variation_id);
                                foreach($variation_ids as $i){

                                    $temp_doc .= ' (' . \EasyShop\Models\Variations::find(trim($i))->name  . ')';
                                    
                                }
                                
                            }
                    
                            if ($di->value) {
                                $temp_doc .= ' (' . $di->value . ')';
                            }
                    
                            if ($switchProductQuantityLabel) {
                                $doc_temp[] = removeChar($di->quantity . 'x' . $temp_doc);
                            } else {
                                $doc_temp[] = removeChar($temp_doc . ' [' . $di->quantity . ']');
                            }
                    
                            $quantity = $quantity + $di->quantity;
                        }
                    }
                    ?>
                    <td><?php echo implode('<br>', $doc_temp); ?></td>
                @elseif($key == 'quantity')
                    <td>{{ $quantity }}</td>
                @elseif($key == 'totalPrice')
                    <td>{{ $doc->totalSum }}</td>
                @elseif($key == 'topprodukti_tel_email')
                    <td>
                        <?php
                        $phone = isset($doc_json->userShipping->phone) ? $doc_json->userShipping->phone : (isset($doc_json->userBilling->phone) ? $doc_json->userBilling->phone : '');
                        $phone = trim($phone);
                        $hasPlus = isset($phone[0]) && $phone[0] === '+';
                        $phone = preg_replace('/[^0-9]/', '', $phone);
                        $phone = $hasPlus ? '+' . $phone : $phone;
                        ?>
                        SM2({{ $phone }})FDS({{ isset($doc_json->userShipping->email) ? $doc_json->userShipping->email : (isset($doc_json->userBilling->email) ? $doc_json->userBilling->email : '') }})
                    </td>
                @elseif($key == 'weight')

                    <td>1</td>
                @elseif($key == 'created_by')

                    <td>
                        @if (!is_null($doc->$key))
                            <?php
                            $user = \EasyShop\Models\User::find($doc->$key);
                            ?>
                            @if(isset($user))
                            {{ $user->first_name . ' ' . $user->last_name }}
                            @else
                            {{'Операторот е избришан од системот (id = ' . $doc->$key . ')'}}
                            @endif
                            @else
                            {{ 'Онлине нарачка' }}
                        @endif
                    </td>
                @elseif($key == 'comment')
                    <td>@if($doc->note != null){{$doc->note}}@endif</td>
                @else
                    <td>{{ $doc->$key }}</td>
                @endif

            @endforeach
        </tr>
        <?php $i++; ?>
        <?php }

		function removeChar($text)
		{
			$text = str_replace("Ă", "A", $text);
			$text = str_replace("ă", "a", $text);
			$text = str_replace("Â", "A", $text);
			$text = str_replace("â", "a", $text);
			$text = str_replace("Î", "I", $text);
			$text = str_replace("î", "i", $text);
			$text = str_replace("Ș", "S", $text);
			$text = str_replace("ș", "s", $text);
			$text = str_replace("î", "i", $text);
			$text = str_replace("ț", "t", $text);
			$text = str_replace("Ț,", "T", $text);
			return $text;
		}

		?>
    </table>
</body>

</html>
