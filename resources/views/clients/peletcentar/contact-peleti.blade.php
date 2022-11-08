{{-- @extends('clients.peletcentar.layouts.default')
@section('content')

    <div id="content" class="row-contact">
        <div class="container content-wrapper contact-page-wrapper">
            <div class="col-md-12">
                <div class="col-md-6 contact-form-wrapper">
                    <p class="success-message">{{session('success')}}</p>
                    <h3>Добијте понуда за пелети</h3>
                    <br>
                    <form action="/contact" method="post">
                        <label for="Name">Име: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <label for="Name">Е-маил: </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="Name">Тип на пелети: </label>
                        <input type="text" class="form-control" id="peleti" name="email" required>
                        <label for="message">Порака: </label>
                        <textarea type="text" class="luna-message" id="message" name="message" required></textarea>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button type="submit" class="send-btn" value="Send">Испрати</button>
                    </form>
                </div>
            </div>
        </div>
        <p> <br> </p>
        <p> </p>
        <p> <br> <br></p>
    </div>

@endsection --}}