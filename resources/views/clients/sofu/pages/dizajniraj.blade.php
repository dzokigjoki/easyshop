@extends('clients.sofu.layouts.default')
@section('content')
<section class="page-banner">
    <h2 class="page-title">Дизајнирај го својот производ</h2>
</section>
<section id="main-container" class="main-container">
    <div class="section-contact-v1 container">
        <div class="row ">
            <div class="design_wrapper">
                <div class="col-sm-12">

                    <div class="pb_15">
                        <div class="row d-flex">
                            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 text-center">
                                <img src="{{ url_assets('/sofu/images/design.jpg') }}" alt="">
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 p_0_details vertical_align">
                                <p class="text-justify">Во SoFu го разбираме различниот вкус на секој клиент и уникатноста на просторот кој треба да го исполниме.
                                    Со огромна љубов и ентузијазам ве охрабруваме да бидете дел од процесот на дизајнирање на вашето
                                    единствено парче мебел. Нашето мото е “Дизајнирано од Вас, направено од Нас”. Пратете ни слика, нацрт
                                    или објаснете ни ја вашата идеја и ние со огромно задоволство и посветеност ќе ја реализираме за вас.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt_15">
                <div class="design_wrapper">
                    <div class="col-sm-12">
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title"> <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">Cancel</a></small></h3>
                            <form action="/kontact" method="POST" id="commentform" class="comment-form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <h4>Напишете ни</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6"><input type="text" name="name" placeholder="Вашето име и презиме *" required></div>
                                    <div class="col-md-6 col-sm-6"><input type="text" required name="subject" placeholder="Наслов *"></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6"><input type="number" required name="phone" placeholder="Вашиот телефон *"></div>
                                    <div class="col-md-6  col-sm-6"><input type="text" name="email" id="email" class="input-form" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Вашата е - пошта *"></div>
                                </div>
                                <div class="message-comment"><textarea name="message" required placeholder="Спецификации... *" rows="5" class="textarea-form"></textarea></div>
                                <div class="col-sm-12 p_0_details">
                                    <p>
                                        <label for="">Слика *</label>
                                        <input type="file" name="image" onchange="previewFile(this);" required>
                                    </p>
                                    <img id="previewImg">
                                </div>
                                <input type="hidden" name="po-naracka" id="po-naracka" value=true>
                                <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Испрати">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@section('scripts')
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
@stop