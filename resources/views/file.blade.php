

<form action="{{url('upload')}}"  method="POST" enctype="multipart/form-data">
@csrf



    <input type="file" name="document">

    <button type="submit" > sub</button>

</form>