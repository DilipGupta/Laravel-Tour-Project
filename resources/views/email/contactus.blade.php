<p>Users infromation are below :</p><br/>
<p>Name : {{ $data['name'] }}</p>
<p>Email : {{ $data['email'] }}</p>
<p>Contact Number : {{ $data['contact_number'] }}</p>
@if($data['message']!='')
<p>Message : {{ $data['message'] }}</p>
@endif