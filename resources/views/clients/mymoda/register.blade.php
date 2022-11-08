@extends('clients.mymoda.layouts.default')
@section('content')


<style>
  td {
    padding-bottom: 15px;
  }

  * {
  }

  #login-label {
    color: #000000;
  }
</style>

<div class="container">
  <div class="section_offset">
    <div class="col-md-6 panel panel-body">
      <h3>Регистрација</h3>



      <form method="POST" action="{{route('auth.register.post')}}" class="type_2">
        {{csrf_field()}}
        <input type="hidden" name="name" value="" />
        <table class="table-shopping-cart table-responsive" style="width: 100%;">
          <tr>
            <td>
              <label for="first_name" class="required">Име</label>
            </td>
            <td>
              <input required="" placeholder="Внесете го вашето име" type="text" name="first_name" id="first_name"
                title="Име" autofocus="" value="{{old('first_name')}}" class="form-control" />
              @if($errors->first('first_name'))
              <div class="error">Полето Име е задолжително</div>
              @endif
            </td>
          </tr>
          <tr>
            <td><label for="last_name" class="required">Презиме</label></td>
            <td> <input placeholder="Внесете го вашето презиме" required="" type="text" name="last_name" id="last_name"
                title="Презиме" value="{{old('last_name')}}" class="form-control" />

              @if($errors->first('first_name'))
              <div class="error">Полето Презиме е задолжително</div>
              @endif</td>
          </tr>
          <tr>
            <td> <label for="email" class="required">Е-Пошта</label></td>
            <td> <input required="" placeholder="Внесете ја вашата email адреса" type="email" name="email" id="email"
                title="Е-Пошта" value="{{old('email')}}" class="form-control" />

              @if($errors->first('email'))
              {{$errors->first('email')}}
              <div class="error">Полето Е-Пошта е задолжително</div>
              @endif</td>
          </tr>
          <tr>
            <td><label for="password" class="required">Лозинка</label></td>
            <td> <input placeholder="Најмалку 6 карактери" required="" type="password" name="password" id="password"
                title="Лозинка" class="form-control" />
              @if($errors->first('password'))
              {{--<div class="alert alert-danger">Полето Лозинка е задолжително и треба да се потврди во полето Потврди лозинка</div>--}}
              <div class="alert alert-danger">{{$errors->first('password')}}</div>
              @endif</td>
          </tr>
          <tr>
            <td><label for="password_confirmation" class="required">Потврди Лозинка</label></td>
            <td><input required="" placeholder="Потврдете ја вашата лозинка" type="password"
                name="password_confirmation" id="password_confirmation" title="Потврди Лозинка" class="form-control">
            </td>
          </tr>
          <tr>

          </tr>
        </table>


        <br>
        <label for="accept"> <input checked="" required="" type="checkbox" value="1" name="accept" id="accept"> Ги
          прочитав и се согласувам со
          <a style="color: #DB392F" target="_blank" href="{{route('blog', [2, 'politika-na-privatnost'])}}">Политиката
            на приватност</a>
          и <a style="color: #DB392F" target="_blank" href="{{route('blog', [1, 'uslovi-za-kupuvanje'])}}">Условите за
            купување</a></label>
        <button type="submit" class="btn btn-cart" style="background-color: #ef4135; color: white">Регистрирај
          се</button>

      </form>
    </div>








    <div class="col-md-5 col-md-offset-1 panel panel-body" id="postoecka_smetka">

      <h3 id="login-label">Веќе имате корисничка сметка на MyModa?</h3>
      <div>
        <div>
          <a href="{{route('auth.login.get')}}" class="btn btn-cart"
            style="background-color: #ef4135; color: white">Најави се</a>
        </div>
      </div>

    </div>


    <!--/ .contactform -->

    <!--/ .theme_box -->



  </div>
</div>
<br><Br>
@endsection