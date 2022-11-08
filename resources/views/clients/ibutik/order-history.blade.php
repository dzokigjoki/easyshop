    @extends('clients.ibutik.layouts.default')
    @section('content')

        {{--{{dd($order_data)}}--}}

        <div class="page_wrapper">

            <div class="container">

                <!-- - - - - - - - - - - - - - Breadcrumbs - - - - - - - - - - - - - - - - -->
                <br>
                <ul class="breadcrumb page-breadcrumb">
                    <li><a href="/">Дома</a></li>
                    <i class="fa fa-angle-right"></i>

                    <li>Историја на нарачки</li>
                </ul>
                <br>
                <section class="section_offset">

                    <div class="title-bg">
                        <h2 class="title">Историја на нарачки</h2>
                    </div><br>
                    <div class="row">

                        @if($order_data)
                            <table class="table panel panel-body" style="font-family: 'Roboto Condensed'">
                                <thead>
                                <th>Нарачка ID</th>
                                <th>Датум на нарачка</th>
                                <th>Производ</th>
                                <th>Цена</th>
                                </thead>
                                <tbody>
                                @foreach($order_data as $row)
                                    <tr>
                                        <td style="vertical-align: middle">{{$row->document_number}}</td>
                                        <td style="vertical-align: middle">{{$row->created_at->format('d.m.Y')}}</td>
                                        <td style="vertical-align: middle">@foreach($row->items as $i)
                                                <strong>{{$i->item_name}}</strong> <span style="font-size: 14px; margin-left: 5px;">x{{$i->quantity}}</span><br> @endforeach</td>

                                        {{--                                    <td>{{$row->item_name}}</td>--}}
                                        {{--<td>{{$row->price}}</td>--}}

                                        <td style="vertical-align: center">
                                            <?php $total = 0; ?>
                                            @foreach($row->items as $i)
                                                <?php  $total += $i->sum_vat ?>
                                            @endforeach
                                                {{number_format((int)$total)}} ден.
                                            {{--@endforeach--}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            Вашата историја на нарачки е празна.
                        @endif

                    </div>
                </section>

            </div>
        </div><br><br>

    @endsection