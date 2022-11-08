<b>Име на клиент:</b> {{$email_data['name']}}<br>
<b>Е- пошта:</b> {{$email_data['email']}}<br>
@if(isset($email_data['phone']))
<b>Телефон:</b> {{$email_data['phone']}}<br>
@endif
<b>Порака:</b> {{$email_data['description']}}<br>